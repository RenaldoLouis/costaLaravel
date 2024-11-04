<?php

// app/Services/AffiliateService.php

namespace App\Services;

use App\Models\AffiliateLink;
use App\Models\AffiliateSale;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AffiliateService
{
    public function recordSale($affiliateLinkId, $productId, $saleAmount, $qty)
    {
        return DB::transaction(function () use ($affiliateLinkId, $productId, $saleAmount, $qty) {
            $product = Product::find($productId);
            if (!$product) {
                // Handle error atau throw exception
                throw new \Exception('Product not found');
            }

            $affiliateLink = AffiliateLink::find($affiliateLinkId);
            if (!$affiliateLink) {
                // Handle error atau throw exception
                throw new \Exception('Affiliate link not found');
            }

            // affiliate_commission bukan persenan, tapi nominal
            $commission = $product->affiliate_commission * $qty;

            // Rekam penjualan dan komisi
            $sale = new AffiliateSale;
            $sale->affiliate_link_id = $affiliateLinkId;
            $sale->amount = $saleAmount;
            $sale->commission = $commission;
            $sale->sale_at = now();
            $sale->save();

            // Rekam transaksi
            Transaction::create([
                'user_id' => $affiliateLink->user_id,
                'type' => 'credit',
                'amount' => $commission,
                'description' => 'Affiliate commission for sale #' . $affiliateLink->product->name,
            ]);

            // Update saldo pengguna
            $affiliateLink->user->updateBalance($commission);

            return true;
        });
    }
}
