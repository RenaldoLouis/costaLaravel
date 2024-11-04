<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    // store multiple
    public function storeMultiple(Request $request)
    {
        $product_id = $request->product_id;
        $images = $request->images;
        // create multiple
        foreach ($images as $image) {
            ProductImage::create([
                'product_id' => $product_id,
                'image' => $image
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Images created'
        ]);
    }

    // index
    public function index(Request $request)
    {
        $product_images = ProductImage::where('product_id', $request->productId)->get();
        return response()->json([
            'success' => true,
            'message' => 'List of All Product Images',
            'data' => $product_images
        ]);
    }

    // delete
    public function destroy($id)
    {
        $product_image = ProductImage::find($id);
        if (!$product_image) {
            return response()->json([
                'success' => false,
                'message' => 'Product Image with id ' . $id . ' not found'
            ], 400);
        }
        $product_image->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product Image with id ' . $id . ' successfully deleted'
        ]);
    }
}
