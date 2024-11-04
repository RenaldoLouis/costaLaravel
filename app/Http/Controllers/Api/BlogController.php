<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\APITrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use APITrait;

    public function __construct()
    {
        $this->model = \App\Models\Blog::class;
        $this->searchableFields = ['title', 'excerpt', 'content']; // Define searchable fields
    }

    // store, save user_id
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $request->merge(['user_id' => auth()->user()->id]);

        $blog = Blog::create($request->all());

        return response()->json($blog, 201);
    }
}
