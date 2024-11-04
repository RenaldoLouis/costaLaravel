<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    use APITrait;

    public function __construct()
    {
        $this->model = Category::class;
        $this->searchableFields = ['name', 'tagline', 'description']; // Define searchable fields
    }

    public function index(Request $request)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function updateOrder(Request $request)
    {
        $categories = $request->input('categories');
        foreach ($categories as $category) {
            Category::where('id', $category['id'])->update(['parent_id' => $category['parent_id']]);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }
}
