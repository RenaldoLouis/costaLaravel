<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AffiliateLink;
use App\Traits\APITrait;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    use APITrait;

    // ketika simpan, buat kode unik
    public function store(Request $request)
    {
        $affiliate = AffiliateLink::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'affiliate_url' => $request->affiliate_url,
            'affiliate_code' => $this->generateUniqueCode(15)
        ]);

        return $this->successResponse($affiliate, 'Affiliate link created successfully');
    }
}
