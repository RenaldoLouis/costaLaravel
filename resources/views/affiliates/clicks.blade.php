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

                        <h4 class="mt-3 mb-3">Affiliate Clicks</h4>
                        <p>Below is the list of clicks that you have made. You will get a commission for every
                            purchase made by your referral.</p>
                        <div class="products-list">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2">Product Name</th>
                                        <th scope="col" rowspan="2">Total Clicks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clicks as $click)
                                        <tr>
                                            <td>
                                                <a href="{{ route('products.showBySlug', $click->product_slug) }}">
                                                    {{ $click->product_name }}
                                                </a>
                                            </td>
                                            <td>{{ $click->total_clicks }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-pagination :products="$clicks" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Orders Page End -->
@endsection
