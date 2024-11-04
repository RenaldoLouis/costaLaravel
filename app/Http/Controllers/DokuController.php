<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DokuController extends Controller
{
    public function initiatePayment(Request $request)
    {

        // Get data from request
        $orderAmount = $request->input('amount', 20000);
        $invoiceNumber = $request->input('invoice_number', 'INV-' . now()->format('Ymd') . '-' . Str::random(6));

        // Retrieve DOKU credentials from .env
        $clientId = env('DOKU_CLIENT_ID');
        $secretKey = env('DOKU_SECRET_KEY');
        $dokuApiUrl = env('APP_ENV') === 'production' ? env('DOKU_BE_URL_PROD') : env('DOKU_BE_URL_DEV');

        // Prepare body
        $body = [
            'order' => [
                'amount' => $orderAmount,
                'invoice_number' => $invoiceNumber,
                // callback_url berdasarkan locale
                'callback_url' => app()->getLocale() == 'id' ? route('thankyou.id', [
                    'code' => $request->code,
                ]) : route('thankyou.en', [
                    'code' => $request->code,
                ]),
                // 'callback_url_result' => url('/'),
                // 'callback_url_cancel' => url('/'),
                // 'auto_redirect' => true,
                // 'line_items' => $request->input('line_items', []),
            ],
            'payment' => [
                'payment_due_date' => 60,
            ],
            'customer' => [
                'name' => $request->input('name', ''),
                'email' => $request->input('email', ''),
                'phone' => $request->input('phone', ''),
                'address' => $request->input('address', ''),
                'country' => 'ID',
            ],
        ];

        // Generate Digest (SHA-256 base64 of the JSON body)
        $bodyJson = json_encode($body);
        $digest = base64_encode(hash('sha256', $bodyJson, true));

        // Generate required headers
        $requestId = (string) Str::uuid();
        $timestamp = now()->utc()->format('Y-m-d\TH:i:s\Z');
        $requestTarget = '/checkout/v1/payment'; // Path of the endpoint

        // Combine signature components
        $signatureRaw = "Client-Id:{$clientId}\n" .
            "Request-Id:{$requestId}\n" .
            "Request-Timestamp:{$timestamp}\n" .
            "Request-Target:{$requestTarget}\n" .
            "Digest:{$digest}";

        // Generate HMAC-SHA256 signature
        $signature = base64_encode(hash_hmac('sha256', $signatureRaw, $secretKey, true));

        // Prepare headers
        $headers = [
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $timestamp,
            'Signature' => "HMACSHA256={$signature}",
            'Digest' => $digest,
        ];

        // Make the request to DOKU API
        $response = Http::withHeaders($headers)->post($dokuApiUrl, $body);

        // Check the response
        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Failed to initiate payment',
            'details' => $response->json(),
        ], $response->status());
    }
}
