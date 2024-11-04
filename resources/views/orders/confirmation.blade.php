@extends('layouts.default')

@section('content')
<div class="wrapper">
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('checkout.breadcrumb_home') }}</a></li>
                <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
            </ol>
        </div>
    </div>

    <div class="checkout-area white-bg pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form mb-sm-40">
                        <h3>Detail Pembayaran</h3>
                        <div class="row">
                            <div class="col-md-4">
                                Nama Lengkap
                            </div>
                            <div class="col-md-8">
                                {{ $orderDetails['name'] }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                Alamat
                            </div>
                            <div class="col-md-8">
                                {{ $orderDetails['address'] }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                Kode Pos
                            </div>
                            <div class="col-md-8">
                                {{ $orderDetails['postcode'] }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-8">
                                {{ $orderDetails['email'] }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                Nomor Telepon
                            </div>
                            <div class="col-md-8">
                                {{ $orderDetails['phone'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Pesanan Anda</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Produk</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails['cart'] as $item)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $item['name'] }} <span class="product-quantity">× {{ $item['quantity'] }}</span>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">Rp {{ number_format($item['price'] * $item['quantity']) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <!-- Pengiriman -->
                                    <tr class="">
                                        <th>Pengiriman</th>
                                        <td>
                                            {{ $orderDetails['shipping_option'] }}
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Biaya Pengiriman</th>
                                        <td><span class="amount">Rp {{ number_format($orderDetails['shipping_cost']) }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total Pesanan</th>
                                        <td><span class="total amount">Rp {{ number_format($orderDetails['total'] + $orderDetails['shipping_cost']) }}</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="order-button-payment mt-30">
                            <button id="checkout-button" class="btn btn-primary">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extend-scripts')
<script src="https://sandbox.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var checkoutButton = document.getElementById('checkout-button');
        checkoutButton.addEventListener('click', function() {
            loadJokulCheckout('{{ $paymentUrl }}');
        });
    });
</script>
@endsection
