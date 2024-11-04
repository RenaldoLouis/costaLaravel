<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AffiliateLink;
use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Region;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    // checkout
    public function checkout()
    {
        // jika belum punya address, maka akan diarahkan ke halaman addresses.create
        if (auth()->check() && auth()->user()->addresses->isEmpty()) {
            return redirect()->route('addresses.create')->with('error', 'Please add your address first before checkout.');
        }

        $title = session('locale') == 'id' ? 'Checkout' : 'Checkout';

        $provinces = Region::getProvinces();

        $addresses = [];
        $defaultAddress = null;

        if (auth()->check()) {
            $user = auth()->user();
            $addresses = $user->addresses; // Mengambil semua alamat pengguna
            $defaultAddress = $user->addresses()->where('is_default', true)->first(); // Mengambil alamat default
        }

        return view('orders.checkout', compact('title', 'addresses', 'defaultAddress', 'provinces'));
    }

    // checkout id
    public function checkoutId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->checkout();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validasi form dan pengecekan autentikasi tetap sama
        if (empty(session('cart'))) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'province_code' => 'required',
            'city_code' => 'required',
            'district_code' => 'required',
            'village_code' => 'required',
        ]);

        // Menghitung total order dan membuat kode pesanan
        $shipping_cost = $request->shipping_cost;

        $cart = session('cart');
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        try {
            // invoice belakangnya 4 digit angka random
            $invoiceNumber = 'INV-' . now()->format('Ymd') . sprintf("%04s", rand(1, 9999));

            $orderDetails = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'province_code' => $request->province_code,
                'city_code' => $request->city_code,
                'district_code' => $request->district_code,
                'village_code' => $request->village_code,
                'total' => $total,
                'shipping_option' => $request->shipping_option,
                'shipping_cost' => $shipping_cost,
                'cart' => $cart,
                'invoice_number' => $invoiceNumber,
            ];

            // Buat atau temukan billing berdasarkan data dari request
            $billing = Billing::create(
                [
                    'name' => $request->name,
                    'address' => $request->address,
                    'postcode' => $request->postcode,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'province_code' => $request->province_code,
                    'city_code' => $request->city_code,
                    'district_code' => $request->district_code,
                    'village_code' => $request->village_code,
                ],
            );

            // SIMPAN DATABASE
            $order = Order::create([
                'user_id' => !empty(auth()->user()) ? auth()->user()->id : null,
                'billing_id' => $billing->id, // Simpan billing_id ke order
                'status' => 'pending',
                'total' => $total + $shipping_cost,
                'code' => md5(uniqid(rand(), true)),
                'invoice_number' => $invoiceNumber,
                'payment_method' => 'virtual_account',
                'payment_status' => 'unpaid',
                'shipping_name' => $request->name,
                'shipping_phone' => $request->phone,
                'shipping_address' => $request->address,
                'shipping_email' => $request->email,
                'shipping_postcode' => $request->postcode,
                'shipping_method' => $request->shipping_option,
                'shipping_cost' => $shipping_cost,
                'province_code' => $request->province_code,
                'city_code' => $request->city_code,
                'district_code' => $request->district_code,
                'village_code' => $request->village_code,
            ]);

            foreach ($cart as $id => $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            }

            // Panggil metode initiatePayment dari DokuController
            $dokuController = new DokuController();
            $dokuResponse = $dokuController->initiatePayment(new Request([
                'amount' => $total + $shipping_cost,
                'invoice_number' => $invoiceNumber,
                'code' => $order->code,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'line_items' => array_map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'image_url' => url('storage' . $item['image']),
                    ];
                }, $cart)
            ]));

            $dokuData = $dokuResponse->getData();

            if (!empty($dokuData->response->payment->url)) {
                $paymentUrl = $dokuData->response->payment->url;
                // Simpan detail order dan payment URL di session
                session(['order_details' => $orderDetails, 'payment_url' => $paymentUrl]);



                // Redirect ke halaman konfirmasi pembayaran
                return redirect()->route('orders.confirmation');
            } else {
                throw new \Exception('Failed to get payment URL from DOKU.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function confirmation()
    {
        $orderDetails = session('order_details');
        $paymentUrl = session('payment_url');

        if (!$orderDetails || !$paymentUrl) {
            return redirect()->route('home')->with('error', 'Invalid payment process.');
        }

        return view('orders.confirmation', compact('orderDetails', 'paymentUrl'));
    }

    public function confirmationId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->confirmation();
    }

    // thank you page
    public function thankyou(Request $request, $code)
    {
        $order = Order::where('code', $request->code)->firstOrFail();

        session()->forget('cart');

        return view('orders.thankyou', compact('order'));
    }

    public function thankyouId(Request $request, $code)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->thankyou($request, $code);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     if (auth()->check()) {
    //         if ($request->filled('address_id')) {
    //             // Get the selected address
    //             $selectedAddress = Address::find($request->address_id);
    //             if ($selectedAddress) {
    //                 $request->merge([
    //                     'name' => auth()->user()->name,
    //                     'email' => auth()->user()->email,
    //                     'phone' => $selectedAddress->recipient_phone,
    //                     'address' => $selectedAddress->address,
    //                     'postcode' => $selectedAddress->postal_code,
    //                     'province_code' => $selectedAddress->province_code,
    //                     'city_code' => $selectedAddress->city_code,
    //                     'district_code' => $selectedAddress->district_code,
    //                     'village_code' => $selectedAddress->village_code,
    //                     'latitude' => $selectedAddress->latitude,
    //                     'longitude' => $selectedAddress->longitude,
    //                 ]);
    //             }
    //         } else {
    //             $request->merge([
    //                 'name' => auth()->user()->name,
    //                 'email' => auth()->user()->email,
    //                 'phone' => auth()->user()->phone,
    //                 'address' => auth()->user()->address,
    //                 'postcode' => auth()->user()->postcode,
    //                 'province_code' => auth()->user()->province_code,
    //                 'city_code' => auth()->user()->city_code,
    //                 'district_code' => auth()->user()->district_code,
    //                 'village_code' => auth()->user()->village_code,
    //                 'latitude' => auth()->user()->latitude,
    //                 'longitude' => auth()->user()->longitude,
    //             ]);
    //         }
    //     }

    //     if (empty(session('cart'))) {
    //         return redirect()->route('home')->with('error', 'Your cart is empty.');
    //     }

    //     $this->validate($request, [
    //         'name' => 'required',
    //         'address' => 'required',
    //         'postcode' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'province_code' => 'required',
    //         'city_code' => 'required',
    //         'district_code' => 'required',
    //         'village_code' => 'required',
    //     ]);

    //     $shipping_cost = 0;

    //     if (!$request->recipient_name) $request->merge(['recipient_name' => $request->name]);
    //     if (!$request->recipient_phone) $request->merge(['recipient_phone' => $request->phone]);
    //     if (!$request->recipient_address) $request->merge(['recipient_address' => $request->address]);
    //     if (!$request->recipient_postcode) $request->merge(['recipient_postcode' => $request->postcode]);
    //     if (!$request->recipient_email) $request->merge(['recipient_email' => $request->email]);

    //     $cart = session('cart');
    //     $total = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     }, $cart));

    //     $orderCode = null;

    //     try {
    //         DB::transaction(function () use ($request, $total, $cart, &$orderCode, $shipping_cost) {
    //             if (!empty($request->create_account)) {
    //                 $user = User::create([
    //                     'name' => $request->name,
    //                     'email' => $request->email,
    //                     'phone' => $request->phone,
    //                     'address' => $request->address,
    //                     'postcode' => $request->postcode,
    //                     'province_code' => $request->province_code,
    //                     'city_code' => $request->city_code,
    //                     'district_code' => $request->district_code,
    //                     'village_code' => $request->village_code,
    //                     'latitude' => $request->latitude,
    //                     'longitude' => $request->longitude,
    //                     'password' => bcrypt($request->password),
    //                 ]);
    //                 $user->assignRole('member');
    //                 auth()->login($user);
    //             }

    //             $billing = Billing::create([
    //                 'name' => $request->name,
    //                 'address' => $request->address,
    //                 'postcode' => $request->postcode,
    //                 'email' => $request->email,
    //                 'phone' => $request->phone,
    //                 'province_code' => $request->province_code,
    //                 'city_code' => $request->city_code,
    //                 'district_code' => $request->district_code,
    //                 'village_code' => $request->village_code,
    //                 'user_id' => auth()->check() ? auth()->id() : null,
    //             ]);

    //             $order = Order::create([
    //                 'billing_id' => $billing->id,
    //                 'user_id' => auth()->check() ? auth()->id() : null,
    //                 'code' => md5(uniqid(rand(), true)),
    //                 'invoice_number' => date('ymd') . sprintf("%04s", Order::count() + 1),
    //                 'status' => 'pending',
    //                 'total' => $total,
    //                 'payment_method' => 'transfer',
    //                 'payment_status' => 'unpaid',
    //                 'shipping_name' => $request->recipient_name,
    //                 'shipping_phone' => $request->recipient_phone,
    //                 'shipping_address' => $request->recipient_address,
    //                 'shipping_email' => $request->recipient_email,
    //                 'shipping_postcode' => $request->recipient_postcode,
    //                 'shipping_cost' => $shipping_cost,
    //                 'province_code' => $request->province_code,
    //                 'city_code' => $request->city_code,
    //                 'district_code' => $request->district_code,
    //                 'village_code' => $request->village_code,
    //                 'latitude' => $request->latitude,
    //                 'longitude' => $request->longitude,
    //             ]);

    //             foreach ($cart as $key => $item) {
    //                 $affiliate_link_id = null;
    //                 $affiliate_clicks = session('affiliate_clicks');
    //                 if (!empty($affiliate_clicks)) {
    //                     foreach ($affiliate_clicks as $click) {
    //                         if ($click['product_id'] == $key) {
    //                             $affiliate_link_id = $click['affiliate_link_id'];
    //                             break;
    //                         }
    //                     }
    //                 }

    //                 $order->details()->create([
    //                     'order_id' => $order->id,
    //                     'product_id' => $key,
    //                     'quantity' => $item['quantity'],
    //                     'price' => $item['price'],
    //                     'total' => $item['price'] * $item['quantity'],
    //                     'affiliate_link_id' => $affiliate_link_id,
    //                 ]);
    //             }

    //             $orderCode = $order->code;
    //             session()->forget('cart');
    //             session()->forget('affiliate_clicks');
    //         });

    //         return redirect()->route('orders.success', $orderCode);
    //     } catch (\Exception $e) {
    //         dd($e);
    //         return redirect()->back()->with('error', 'There was a problem processing your order. Please try again.');
    //     }
    // }


    /**
     * Display the specified resource.
     */
    public function success($code)
    {
        // cocokkan kode
        $order = Order::where('code', $code)->firstOrFail();
        return view('orders.success', compact('order'));
    }

    // successId
    public function successId($code)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->success($code);
    }

    // invoice, params $code
    public function invoice(Request $request, $code)
    {
        $order = Order::where('code', $request->code)
            ->with('details', 'details.product')
            ->firstOrFail();
        $pdf = PDF::loadView('orders.invoice', compact('order'));

        // You can use download to force download or stream to view it in the browser
        // render
        return $pdf->stream();
    }

    // invoiceId
    public function invoiceId(Request $request, $code)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->invoice($request, $request->code);
    }
}
