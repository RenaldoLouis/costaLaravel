@extends('layouts.default')

@section('content')
    @php
        $settings = \App\Models\Setting::pluck('value', 'key')->all();
        $categories = \App\Models\Category::where('is_active', true)
            ->with([
                'products' => function ($query) {
                    $query->limit(4);
                },
            ])
            ->get();

        // cart ambil dari session cart, jika tidak ada, maka array kosong
        $cart = session()->get('cart', []);
    @endphp
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }

        .error-container .fa-exclamation-triangle {
            font-size: 100px;
            color: #ff6f61;
        }

        .error-container h1 {
            font-size: 120px;
            margin: 20px 0;
        }

        .error-container h2 {
            font-size: 40px;
            margin: 10px 0;
        }

        .error-container p {
            font-size: 20px;
            margin: 20px 0;
        }

        .error-container a {
            font-size: 20px;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .error-container a:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="error-container">
        <i class="fa fa-exclamation-triangle"></i>
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>Sorry, the page you are looking for doesn't exist or has been moved.</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>
@endsection
