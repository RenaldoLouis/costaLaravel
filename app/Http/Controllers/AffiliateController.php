<?php

namespace App\Http\Controllers;

use App\Models\AffiliateClick;
use App\Models\AffiliateLink;
use App\Models\AffiliateSale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AffiliateController extends Controller
{
    // link
    public function link($productId, $userProductCode)
    {
        if (!auth()->user()->is_affiliate) {
            return redirect()->route('account');
        }

        // cek jika $userProductCode adalah md5 dari auth()->id.'-'.$productId
        if ($userProductCode != md5(auth()->id() . '-' . $productId)) {
            abort(404, 'Affiliate link not found');
        }

        // cek apakah sudah ada affiliate link untuk user dan product ini
        $affiliateLink = AffiliateLink::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        // jika sudah ada, maka return json
        if ($affiliateLink) {
            return response()->json([
                'success' => true,
                'affiliate_code' => $affiliateLink->affiliate_code,
            ]);
        }

        $affiliateCode = substr(md5(now()), 0, 10);

        // cek dulu apakah sudah ada affiliate code di table affiliate_links
        $affiliateLink = AffiliateLink::where('affiliate_code', $affiliateCode)->first();

        // jika sudah ada, maka generate ulang
        if ($affiliateLink) {
            $affiliateCode = substr(md5(now()), 0, 10);
        }

        $link = AffiliateLink::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'affiliate_code' => $affiliateCode,
            'affiliate_url' => ''
        ]);

        // return json
        return response()->json([
            'success' => true,
            'affiliate_code' => $affiliateCode,
        ]);
    }

    // linkRedirect
    public function linkRedirect($affiliateCode)
    {
        // Temukan link afiliasi berdasarkan kode unik
        $affiliateLink = AffiliateLink::where('affiliate_code', $affiliateCode)->first();

        if (!$affiliateLink) {
            abort(404, 'Affiliate link not found');
        }

        // Rekam klik ke dalam database
        $click = new AffiliateClick;
        $click->affiliate_link_id = $affiliateLink->id;
        $click->visitor_ip = request()->ip();
        $click->clicked_at = now();
        $click->save();

        $affiliateClicks = session('affiliate_clicks', []);
        // hindari duplikasi, jika product_id sudah ada di session, maka jangan tambahkan lagi
        foreach ($affiliateClicks as $ac) {
            if ($ac['product_id'] == $affiliateLink->product_id) {
                return redirect(route('products.showBySlug', $affiliateLink->product->slug));
            }
        }

        $affiliateClicks[] = [
            'affiliate_link_id' => $affiliateLink->id,
            'product_id' => $affiliateLink->product_id,
        ];
        session(['affiliate_clicks' => $affiliateClicks]);

        // Redirect ke URL tujuan
        return redirect(route('products.showBySlug', $affiliateLink->product->slug));
    }

    // dashboard
    public function dashboard()
    {
        if (!auth()->user()->is_affiliate) {
            return redirect()->route('account');
        }

        $products = Product::query();
        $products = $products->paginate(10);

        return view('affiliates.dashboard', compact('products'));
    }

    public function links()
    {
        // dapatkan semua link afiliasi yang dimiliki oleh user
        $links = AffiliateLink::with('product')->where('user_id', auth()->id())->paginate(10);

        return view('affiliates.links', compact('links'));
    }

    // clicks
    public function clicks()
    {
        // dapatkan semua klik yang dilakukan oleh user, digroup berdasarkan product, dengan jumlah klik
        $clicks = AffiliateClick::join('affiliate_links', 'affiliate_links.id', '=', 'affiliate_clicks.affiliate_link_id')
            ->where('affiliate_links.user_id', auth()->id())
            ->groupBy('affiliate_links.product_id')
            ->join('products', 'products.id', '=', 'affiliate_links.product_id')
            ->selectRaw('affiliate_links.product_id, count(*) as total_clicks, products.name as product_name, products.slug as product_slug')
            ->paginate(10);

        return view('affiliates.clicks', compact('clicks'));
    }

    // sales
    public function sales()
    {
        // dapatkan semua penjualan yang dilakukan oleh user, tidak digroup, urutkan berdasarkan tanggal terakhir
        // dapatkan komisi yang diterima
        $sales = AffiliateSale::join('affiliate_links', 'affiliate_links.id', '=', 'affiliate_sales.affiliate_link_id')
            ->where('affiliate_links.user_id', auth()->id())
            ->join('products', 'products.id', '=', 'affiliate_links.product_id')
            ->select('affiliate_sales.*', 'products.name as product_name', 'products.slug as product_slug')
            ->orderBy('sale_at', 'desc')
            ->paginate(10);

        return view('affiliates.sales', compact('sales'));
    }
}
