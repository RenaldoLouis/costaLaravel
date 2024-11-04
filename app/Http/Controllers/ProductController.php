<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('categories')) {
            $products->whereIn('category_id', $request->categories);
        }

        // search filter, jika ada, keywordnya jangan 'keyword'
        if ($request->has('keyword') && $request->keyword != 'keyword') {
            $products->where('name', 'like', '%' . $request->keyword . '%');
            $products->orWhere('summary', 'like', '%' . $request->keyword . '%');
        }

        // sort by request sort
        if ($request->has('sort')) {
            if ($request->sort == 'price asc') {
                $products->orderBy('price');
            } elseif ($request->sort == 'price desc') {
                $products->orderBy('price', 'desc');
            }
        }

        $products = $products->with('images')->paginate(9);

        // check locale
        $title = session('locale') == 'id' ? 'Semua Produk' : 'All Products';

        return view('products.index', compact('products', 'title'));
    }

    // indexId
    public function indexId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->index(request());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::with('images')->find($product->id);
        $title = $product->name;
        return view('products.show', compact('product', 'title'));
    }

    // showBySlug
    public function showBySlug($locale, $slug)
    {
        $product = Product::with('images')->where('slug', $slug)->first();
        // show related products
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
        $title = $product->name;
        return view('products.show', compact('product', 'relatedProducts', 'title'));
    }

    // showBySlugId
    public function showBySlugId($slug)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->showBySlug('id', $slug);
    }
}
