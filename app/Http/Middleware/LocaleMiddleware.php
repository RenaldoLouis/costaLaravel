<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Mendapatkan segmen pertama dari URL sebagai prefix bahasa
        $locale = $request->segment(1);

        // Daftar bahasa yang didukung
        $supportedLocales = ['id']; // Tambahkan bahasa lain jika diperlukan

        if (in_array($locale, $supportedLocales)) {
            app()->setLocale($locale);
            return $next($request);
        }

        // Jika tidak ada prefix bahasa yang valid, gunakan bahasa default
        app()->setLocale(config('app.fallback_locale'));
        return $next($request);
    }
}
