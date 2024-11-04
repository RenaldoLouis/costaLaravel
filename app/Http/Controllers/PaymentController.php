<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    // doku notification
    public function transferNotify(Request $request)
    {
        Log::info('DOKU Transfer Notification', $request->all());

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Ambil semua data dari request
            $data = $request->all();

            // Validasi data yang diterima
            $validatedData = $request->validate([
                'order.invoice_number' => 'required|string',
                'transaction.status' => 'required|string',
            ]);

            // Temukan order berdasarkan invoice number
            $order = Order::where('invoice_number', $data['order']['invoice_number'])->first();

            if ($data['transaction']['status'] === 'SUCCESS') {

                Log::info('DOKU Transfer Notification Success', $data);
                // Update order jika pembayaran sukses
                $order->update([
                    'status' => 'processing',
                    'payment_status' => 'paid',
                    'payment_method' => $data['channel']['id'],
                    'doku_request_json' => json_encode($data),
                    'paid_at' => now(),
                ]);

                // Kirim email notifikasi ke user
                Mail::to($order->billing->email)->send(new OrderStatusUpdated($order));
            }

            // Commit transaksi jika tidak ada masalah
            DB::commit();

            // Buat response yang sesuai dengan format yang diminta oleh DOKU
            return response()->json([
                'responseCode' => '2002500',
                'responseMessage' => 'Success',
                'virtualAccountData' => [
                    'partnerServiceId' => $validatedData['order']['invoice_number'], // Misalnya dari invoice_number
                    'customerNo' => $order->user_id, // Ini contoh; sesuaikan dengan data yang relevan
                    'virtualAccountNo' => $data['virtual_account_info']['virtual_account_number'], // VA number
                    'virtualAccountName' => $order->user->name, // Misalnya nama user
                    'trxId' => $data['transaction']['original_request_id'], // ID transaksi dari DOKU
                    'paymentRequestId' => uniqid(), // Anda bisa menggunakan ID yang sesuai dengan sistem Anda
                ]
            ]);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            // Log error untuk debugging
            Log::error('DOKU Transfer Notification Error', ['error' => $e->getMessage(), 'data' => $data]);

            // Response dengan status error
            return response()->json([
                'responseCode' => '500',
                'responseMessage' => 'Internal Server Error',
            ], 500);
        }
    }


    // debitNotify
    public function debitNotify(Request $request)
    {
        $data = $request->all();
        Log::info('DOKU Debit Notification', $data);
        return response()->json(['status' => 'OK', 'data' => $data]);
    }
}
