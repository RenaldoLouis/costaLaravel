<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $settings;

    // pada saat semua halaman dijalankan, bikin variable $categories
    public function __construct()
    {
        // get settings
        $this->settings = Setting::pluck('value', 'key')->all();
        View::share('settings', $this->settings);

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['products' => function ($query) {
                $query->limit(4);
            }])
            ->get();
        View::share('categories', $categories);
    }
}
