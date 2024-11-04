@extends('layouts.default')

@section('content')
    <div class="wrapper">
        <div class="breadcrumb-area">
            <div class="container">
                <ol class="breadcrumb breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('checkout.breadcrumb_home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('checkout.breadcrumb_checkout') }}</li>
                </ol>
            </div>
        </div>

        @if (count($cart) === 0)
            <div class="container pt-80 pb-80">
                <div class="alert alert-info">
                    {{ __('checkout.cart_empty') }}<br>
                    <a
                        href="{{ route('products', ['locale' => app()->getLocale()]) }}">{{ __('checkout.continue_shopping') }}</a>
                </div>
            </div>
        @else
            <div class="coupon-area white-bg pt-80 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon-accordion">
                                @include('checkout.login')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-area white-bg pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkbox-form mb-sm-40">
                                <h3>{{ __('checkout.billing_details') }}</h3>
                                {{ html()->form('POST', route('orders.store', ['locale' => app()->getLocale()]))->open() }}
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (auth()->guest())
                                    <div class="row">
                                        @include('checkout.guest-address-form')
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="select-address">{{ __('checkout.select_address') }}</label>
                                            <select id="select-address" name="address_id" class="form-control">
                                                @foreach ($addresses as $address)
                                                    <option value="{{ $address->id }}"
                                                        {{ $address->is_default ? 'selected' : '' }}>
                                                        {{ $address->name }} - {{ $address->address }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <a href="{{ route('addresses.create', ['locale' => app()->getLocale()]) }}"
                                                class="btn btn-primary">{{ __('checkout.add_new_address') }}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">{{ __('checkout.full_name') }}</div>
                                        <div class="col-md-8" id="address-name">{{ $defaultAddress->name ?? '' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">{{ __('checkout.address') }}</div>
                                        <div class="col-md-8" id="address-address">{{ $defaultAddress->address ?? '' }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">{{ __('checkout.postcode_zip') }}</div>
                                        <div class="col-md-8" id="address-postcode">
                                            {{ $defaultAddress->postal_code ?? '' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">{{ __('checkout.email') }}</div>
                                        <div class="col-md-8" id="address-email">
                                            {{ $defaultAddress->recipient_email ?? '' }}</div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-4">{{ __('checkout.phone') }}</div>
                                        <div class="col-md-8" id="address-phone">
                                            {{ $defaultAddress->recipient_phone ?? '' }}</div>
                                    </div>
                                @endif

                                <input type="hidden" name="shipping_cost" id="shipping_cost_input" value="0">
                                <input type="hidden" name="total" id="total_input" value="">

                                {{ html()->submit(__('checkout.checkout'))->class('mt-30 login-btn ms-auto')->id('place-order-btn')->style('display: none;') }}
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="your-order" style="position: sticky; top: 100px;">
                                <h3>{{ __('checkout.your_order') }}</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">{{ __('checkout.product') }}</th>
                                                <th class="product-total">{{ __('checkout.total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (session('cart', []) as $id => $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item['name'] }} <span class="product-quantity">×
                                                            {{ $item['quantity'] }}</span>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">Rp
                                                            {{ number_format($item['price'] * $item['quantity']) }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-id="{{ $id }}"
                                                            class="remove-item">{{ __('checkout.remove') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <!-- Tambahkan pilihan pengiriman di sini -->
                                            <tr class="shipping-options">
                                                <th>{{ __('checkout.shipping_options') }}</th>
                                                <td>
                                                    <div id="shipping-rate-result">
                                                        <!-- not defined yet -->
                                                        <span>{{ __('checkout.shipping_options_not_defined') }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>{{ __('checkout.shipping_cost') }}</th>
                                                <td><span id="shipping-cost" class="amount">Rp 0</span></td>
                                            </tr>
                                            @php
                                                $total = array_sum(
                                                    array_map(function ($item) {
                                                        return $item['price'] * $item['quantity'];
                                                    }, $cart),
                                                );
                                            @endphp
                                            <tr class="order-total">
                                                <th>{{ __('checkout.order_total') }}</th>
                                                <td><span id="order-total" class="total amount"
                                                        data-value="{{ $total }}">Rp
                                                        {{ number_format($total) }}</span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- <x-payment-method /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('extend-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            @if (!auth()->guest())
                const addresses = @json($addresses);
                const addressSelect = document.getElementById('select-address');
                const addressName = document.getElementById('address-name');
                const addressAddress = document.getElementById('address-address');
                const addressPostcode = document.getElementById('address-postcode');
                const addressEmail = document.getElementById('address-email');
                const addressPhone = document.getElementById('address-phone');

                addressSelect.addEventListener('change', function() {
                    const selectedAddressId = this.value;
                    const selectedAddress = addresses.find(address => address.id == selectedAddressId);

                    addressName.textContent = selectedAddress.name;
                    addressAddress.textContent = selectedAddress.address;
                    addressPostcode.textContent = selectedAddress.postal_code;
                    addressEmail.textContent = selectedAddress.recipient_email;
                    addressPhone.textContent = selectedAddress.recipient_phone;
                });
            @endif

            document.querySelectorAll('.remove-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();

                    const itemId = this.getAttribute('data-id');
                    fetch(`/cart/remove/${itemId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('tr').remove();

                                let shippingCostText = $('#shipping-cost').text();
                                let shippingCost = parseFloat(shippingCostText.replace(
                                    /[^0-9.-]+/g, ""));

                                data.total = parseFloat(data.total.replace(/[^0-9.-]+/g, "")) +
                                    shippingCost;

                                document.getElementById('order-total').textContent = 'Rp ' +
                                    data.total.toLocaleString();
                            } else {
                                alert('Gagal menghapus item.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });

            document.getElementById('place-order-btn').addEventListener('click', function(e) {

                // Update hidden fields before submitting form
                document.getElementById('shipping_cost_input').value = parseFloat(document.getElementById(
                    'shipping-cost').textContent.replace(/[^0-9.-]+/g, ""));
                document.getElementById('total_input').value = parseFloat(document.getElementById(
                    'order-total').getAttribute('data-value'));

                if (!confirm('Apakah Anda yakin ingin menyelesaikan pesanan?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
