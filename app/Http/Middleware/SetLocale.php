<?php

// app/Http/Middleware/SetLocale.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // jika ada prefix "id", maka hilangkan prefix tersebut, dan jika GET aja
        if ($request->segment(1) === 'id' && $request->isMethod('GET')) {
            return redirect(str_replace('/id', '', $request->url()),301);
        }
        app()->setLocale($request->segment(1));
        session()->put('locale', $request->segment(1));

        URL::defaults(['locale' => $request->segment(1)]);

        return $next($request);
    }
}

