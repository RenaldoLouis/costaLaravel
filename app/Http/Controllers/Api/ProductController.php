<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\APITrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use APITrait;

    public function __construct()
    {
        $this->model = \App\Models\Product::class;
        $this->searchableFields = ['name', 'description']; // Define searchable fields
    }
}
