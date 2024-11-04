<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdated;
use App\Models\AffiliateLink;
use App\Models\Order;
use App\Services\AffiliateService;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    use APITrait;

    protected function extendQuery($query)
    {
        if (!empty(request()->status) || !empty(request()->filter['status'])) {
            $query = $query->where('status', request()->status ?? request()->filter['status']);
        }
        $query = $query->with(['billing']);

        // jika sortBy
        if (!empty(request()->sortBy)) {
            $query = $query->orderBy(request()->sortBy, request()->descending == 'true' ? 'desc' : 'asc');
        }

        return $query;
    }

    // count
    public function count(Request $request)
    {
        return $this->index($request->merge(['type' => 'count']));
    }

    // show
    public function show($id)
    {
        $order = Order::with(['billing', 'details.product'])->findOrFail($id);
        return response()->json($order);
    }

    // updateStatus
    public function updateStatus($id)
    {
        $order = Order::with(['billing', 'details.product'])->findOrFail($id);
        $order->update(['status' => request()->status]);

        // jika status adalah "completed"
        if ($order->status == 'completed') {
            // looping order untuk mendapatkan id products
            foreach ($order->details as $detail) {
                $affiliateLinkId = $detail->affiliate_link_id;

                if (empty($affiliateLinkId)) {
                    continue; // Skip jika tidak ada affiliate link
                }

                $productId = $detail->product_id;
                $saleAmount = $detail->price * $detail->quantity;

                // Membuat instance AffiliateService
                $affiliateService = app(AffiliateService::class);

                // Rekam penjualan afiliasi
                $affiliateService->recordSale($affiliateLinkId, $productId, $saleAmount, $detail->quantity);
            }
        }

        // Kirim email
        Mail::to($order->billing->email)
            ->send(new OrderStatusUpdated($order));

        return response()->json($order);
    }
}
