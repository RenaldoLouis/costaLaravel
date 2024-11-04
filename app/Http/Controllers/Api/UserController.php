<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\APITrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use APITrait;

    // default menampilkan email_verified_at yang tidak null
    public function extendQuery($query)
    {
        if (!request()->has('showAll'))
            $query = $query->whereNotNull('email_verified_at');

        // jika ada filter[is_affiliate]
        if (request()->has('filter.is_affiliate')) {
            $query = $query->where('is_affiliate', 1);
        }

        // is_reseller
        if (request()->has('filter.is_reseller')) {
            $query = $query->where('is_reseller', 1);
        }

        return $query;
    }

    // verify reseller: update reseller_verified_at, tapi nama endpoint API jangan kata kerja
    public function verifyReseller(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->reseller_verified_at = now();
        $user->save();

        return response()->json([
            'success' => true, // tambahkan key success
            'message' => 'Reseller verified',
            'data' => $user,
        ]);
    }

    // verifyAffiliator
    public function verifyAffiliator(Request $request, $id)
    {
        // now
        $user = User::findOrFail($id);
        $user->affiliator_verified_at = now();
        $user->save();

        return response()->json([
            'success' => true, // tambahkan key success
            'message' => 'Affiliator verified',
            'data' => $user,
        ]);
    }
}
