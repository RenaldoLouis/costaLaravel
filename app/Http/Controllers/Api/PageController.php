<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\APITrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use APITrait;

    public function showBySlug($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            return $this->success($page);
        }else{
            // create a new page
            $page = Page::create([
                'title' => $slug,
                'slug' => $slug,
                'content' => 'This is a new page'
            ]);
            return $this->success($page);
        }
    }
}
