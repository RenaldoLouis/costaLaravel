@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">My Orders</li>
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
                        <h3 class="mb-3">My Orders</h3>

                        <!-- Search Form -->
                        <form action="{{ route('users.my-orders') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search by invoice number or product name" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>


                        <table class="orders-table">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Products</th>
                                    <th style="text-align: right">Total</th>
                                    <th>Shipping Address</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->invoice_number }}</td>
                                        <td>
                                            <ul class="products-list">
                                                @foreach ($order->details as $detail)
                                                    <li>{{ $detail->product->name }} (Quantity: {{ $detail->quantity }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td style="text-align: right">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td>
                                            {{ $order->shipping_name }}<br>
                                            {{ $order->shipping_address }}<br>
                                            {{ $order->shipping_address2 }}<br>
                                            {{ $order->shipping_postcode }}
                                        </td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('users.my-orders.show', $order->code) }}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <x-pagination :products="$orders->appends(['search' => request('search')])" />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Orders Page End -->
@endsection

@section('extend-scripts')
    <!-- Custom scripts for this page if any -->
@endsection
