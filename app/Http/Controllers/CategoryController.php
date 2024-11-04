<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('categories.index');
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
    public function showBySlug(Request $request, $locale, $slug)
    {
        // get route params
        $params = $request->route()->parameters();
        $category = Category::where('slug', $slug)->first();

        // jika tidak ada kategori, maka akan menampilkan halaman 404
        if (!$category) {
            abort(404);
        }

        // Ambil semua ID kategori dan subkategori secara rekursif
        $categoryIds = $this->getAllCategoryIds($category);

        $products = Product::query();

        // Filter produk berdasarkan kategori ID yang diambil (termasuk subkategori)
        $products->whereIn('category_id', $categoryIds);

        // sort by request sort
        if ($request->has('sort')) {
            if ($request->sort == 'price asc') {
                $products->orderBy('price');
            } elseif ($request->sort == 'price desc') {
                $products->orderBy('price', 'desc');
            }
        }

        $products = $products->with('images')->paginate(9);

        // get subcategories
        $subcategories = $category->children;

        // check locale
        $title = session('locale') == 'id' ? 'Semua Produk' : 'All Products';

        return view('categories.show', compact('category', 'products', 'title', 'subcategories'));
    }

    /**
     * Fungsi untuk mengambil semua ID kategori secara rekursif, termasuk kategori dan subkategori.
     */
    private function getAllCategoryIds($category)
    {
        // Mulai dengan ID kategori saat ini
        $categoryIds = [$category->id];

        // Ambil semua subkategori dari kategori saat ini
        foreach ($category->children as $child) {
            // Rekursif panggil fungsi ini untuk mendapatkan ID subkategori
            $categoryIds = array_merge($categoryIds, $this->getAllCategoryIds($child));
        }

        return $categoryIds;
    }



    // showBySlugId (indonesia, locale tidak diisi)
    public function showBySlugId(Request $request, $slug)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->showBySlug($request, 'id', $slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
