<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class LoadSessionData
{
    public function handle($request, Closure $next)
    {
        // Ambil data dari sesi
        $cart = session()->get('cart', []);

        // Bagikan data ke semua views
        View::share('cart', $cart);

        return $next($request);
    }
}
