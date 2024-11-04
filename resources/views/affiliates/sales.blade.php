@extends('layouts.default')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Affiliator</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- My Orders Page Start -->
    <div class="my-account-page ptb-80">
        <div class="container">
            <div class="row">
                @include('users._sidebar') <!-- Include the sidebar -->

                <div class="col-lg-9">
                    <div class="account-content">
                        <h3 class="mb-3">Affiliate Dashboard</h3>


                        <x-affiliate-statistic />

                        <h4 class="mt-3 mb-3">Affiliate Sales</h4>
                        <p>Below is the list of sales that you have made through your affiliate links.</p>
                        <div class="products-list">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Commission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->created_at->format('d M Y, H:i') }}</td>
                                            <td>
                                                <a href="{{ route('products.showBySlug', $sale->product_slug) }}">
                                                    {{ $sale->product_name }}
                                                </a>
                                            </td>
                                            <td>IDR {{ number_format($sale->commission, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-pagination :products="$sales" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Orders Page End -->
@endsection
