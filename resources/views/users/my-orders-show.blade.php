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
                        <h3 class="mb-3">Detail Order</h3>
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left h5">Order #{{ $order->invoice_number }}
                                    <span class="badge badge-pill badge-{{ $order->status == 'unpaid' ? 'warning' : ($order->status == 'paid' ? 'primary' : 'success') }}">{{ $order->status }}</span>
                                </div>
                                <span class="float-right">{{ $order->created_at->format('d-m-Y, H:i') }}</span>
                            </div>
                            <div class="card-body">
                                @include('users.partials.order-details')
                            </div>
                        </div>
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
