<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Fungsi untuk menghitung harga akhir
    private function calculateFinalPrice($item)
    {
        if ($item['discount_percentage'] > 0) {
            return $item['price'] - $item['discount_fixed'];
        }
        return $item['price'];
    }

    // Menampilkan halaman keranjang
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = array_sum(array_map(function ($item) {
            return $this->calculateFinalPrice($item) * $item['quantity'];
        }, $cart));

        $title = session('locale') == 'id' ? 'Keranjang Belanja' : 'Shopping Cart';
        return view('carts.index', compact('cart', 'total', 'title'));
    }

    // Menambahkan produk ke keranjang
    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Jika produk sudah ada di keranjang, tambahkan quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada di keranjang, tambahkan dengan quantity yang diberikan
            $cart[$productId] = [
                "name" => $product->name,
                "slug" => $product->slug,
                "quantity" => $quantity,
                'discount_percentage' => $product->discount_percentage,
                "price" => $product->price,
                'discount_fixed' => $product->discount_fixed,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        // Hitung total dengan mempertimbangkan diskon
        $total = array_sum(array_map(function ($item) {
            return $this->calculateFinalPrice($item) * $item['quantity'];
        }, $cart));

        // Mulai output buffering
        ob_start();

        foreach ($cart as $id => $item) {
            $finalPrice = $this->calculateFinalPrice($item);
            echo '<div class="single-cart-box">';
            echo '<div class="cart-img">';
            echo '<a href="' . route('products.showBySlug', $item['slug']) . '"><img class="square-image" src="' . asset('storage/' . $item['image']) . '" alt="cart-image"></a>';
            echo '<span class="pro-quantity">' . $item['quantity'] . 'X</span>';
            echo '</div>';
            echo '<div class="cart-content">';
            echo '<h6><a href="' . route('products.showBySlug', $item['slug']) . '">' . $item['name'] . '</a></h6>';
            if ($item['discount_percentage'] > 0) {
                echo '<span class="cart-price">Rp ' . number_format($finalPrice, 0, ',', '.') . '</span>';
                echo '<del class="old-price">Rp ' . number_format($item['price'], 0, ',', '.') . '</del>';
            } else {
                echo '<span class="cart-price">Rp ' . number_format($item['price'], 0, ',', '.') . '</span>';
            }
            echo '</div>';
            echo '<a class="del-icone" href="#"><i class="ion-close"></i></a>';
            echo '</div>';
        }

        // Menangkap output HTML
        $cartHtml = ob_get_clean();

        return response()->json([
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'cart' => $cart,
            'newCart' => [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => number_format($this->calculateFinalPrice($cart[$productId]), 0, ',', '.'),
                'image' => $product->image,
            ],
            'cartHtml' => $cartHtml,
            'totalItems' => count($cart),
            'total' => number_format($total, 0, ',', '.')
        ], 200);
    }

    // Mengupdate keranjang
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->items as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        // Hitung total dengan mempertimbangkan diskon
        $total = array_sum(array_map(function ($item) {
            return $this->calculateFinalPrice($item) * $item['quantity'];
        }, $cart));

        return response()->json(['message' => 'Cart has been updated', 'total' => number_format($total, 0, ',', '.')]);
    }

    // Menghapus item dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            // Hitung ulang total dengan mempertimbangkan diskon
            $total = array_sum(array_map(function ($item) {
                return $this->calculateFinalPrice($item) * $item['quantity'];
            }, $cart));

            return response()->json(['success' => true, 'total' => number_format($total, 0, ',', '.')]);
        }

        return response()->json(['success' => false], 400);
    }
}
