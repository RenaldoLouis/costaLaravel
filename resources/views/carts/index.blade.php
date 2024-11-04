@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('header.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('header.cart') }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Cart Main Area Start -->
    <div class="cart-main-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Form Start -->
                    <form action="#">
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive mb-45">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">{{ __('cart.image') }}</th>
                                        <th class="product-name">{{ __('cart.product') }}</th>
                                        <th class="product-price">{{ __('cart.price') }}</th>
                                        <th class="product-quantity">{{ __('cart.quantity') }}</th>
                                        <th class="product-subtotal">{{ __('cart.total') }}</th>
                                        <th class="product-remove">{{ __('cart.remove') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Fungsi helper untuk menghitung harga akhir
                                        function calculateFinalPrice($item) {
                                            if ($item['discount_percentage'] > 0) {
                                                // Jika discount_fixed adalah harga setelah diskon
                                                return $item['discount_fixed'];

                                                // Jika discount_fixed adalah jumlah diskon, gunakan baris berikut dan komentari baris di atas
                                                // return $item['price'] - $item['discount_fixed'];
                                            }
                                            return $item['price'];
                                        }
                                    @endphp

                                    @php
                                        // Hitung total dengan mempertimbangkan diskon
                                        $total = collect($cart)->sum(function ($item) {
                                            return calculateFinalPrice($item) * $item['quantity'];
                                        });
                                    @endphp

                                    @foreach ($cart as $id => $item)
                                        @php
                                            $finalPrice = calculateFinalPrice($item);
                                            $subtotal = $finalPrice * $item['quantity'];
                                        @endphp
                                        <tr class="product-row" id="product-row-{{ $id }}" data-id="{{ $id }}">
                                            <td class="product-thumbnail">
                                                <a href="{{ route('products.showBySlug', $item['slug']) }}">
                                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="cart-image" />
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ route('products.showBySlug', $item['slug']) }}">{{ $item['name'] }}</a>
                                            </td>
                                            <td class="product-price" id="price-{{ $id }}" data-final-price="{{ $finalPrice }}">
                                                <span class="amount">Rp {{ number_format($finalPrice, 0, ',', '.') }}</span>
                                                <br>
                                                @if ($item['discount_percentage'] > 0)
                                                    <del class="old-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</del>
                                                @endif
                                            </td>
                                            <td class="product-quantity">
                                                <input type="number"
                                                       id="quantity-{{ $id }}"
                                                       value="{{ $item['quantity'] }}"
                                                       min="1"
                                                       oninput="updateQuantity('{{ $id }}', {{ $finalPrice }})" />
                                            </td>
                                            <td class="product-subtotal" id="subtotal-{{ $id }}">
                                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                                            </td>
                                            <td class="product-remove">
                                                <form id="delete-form-{{ $id }}" action="{{ url('/cart/remove/' . $id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="#" onclick="event.preventDefault(); deleteItem('{{ $id }}');">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content End -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-md-8 col-sm-12">
                                <div class="buttons-cart">
                                    <input type="button" value="{{ __('cart.update_cart') }}" onclick="updateCart()" />
                                    <a href="{{ url('/') }}">{{ __('cart.continue_shopping') }}</a>
                                </div>
                            </div>
                            <!-- Cart Button End -->
                            <!-- Cart Totals Start -->
                            <div class="col-md-4 col-sm-12">
                                <div class="cart_totals ms-auto text-md-end">
                                    <h2>{{ __('cart.cart_totals') }}</h2>
                                    <br />
                                    <table class="ms-auto">
                                        <tbody>
                                            <tr class="order-total">
                                                <th>{{ __('cart.total') }}</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount" id="total-amount">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="#" onclick="checkCartUpdate()">{{ __('cart.proceed_to_checkout') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
@endsection

@section('extend-scripts')
    <script>
        let cartUpdated = false;

        function updateQuantity(productId, finalPrice) {
            let quantityInput = document.getElementById('quantity-' + productId);
            let quantity = parseInt(quantityInput.value);
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                quantityInput.value = quantity;
            }

            let subtotal = quantity * finalPrice;
            document.getElementById('subtotal-' + productId).innerText =
                `Rp ${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 0 })}`;

            updateTotal();
            cartUpdated = true;
        }

        function updateTotal() {
            let items = document.querySelectorAll('.product-row');
            let total = 0;
            items.forEach(item => {
                let quantity = parseInt(item.querySelector('.product-quantity input').value);
                let finalPrice = parseFloat(item.querySelector('.product-price').getAttribute('data-final-price'));
                if (!isNaN(quantity) && !isNaN(finalPrice)) {
                    total += quantity * finalPrice;
                }
            });
            document.getElementById('total-amount').innerText =
                `Rp ${total.toLocaleString('id-ID', { minimumFractionDigits: 0 })}`;
        }

        function deleteItem(productId) {
            $.ajax({
                url: '/cart/remove/' + productId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(result) {
                    // Hapus baris produk dari tabel
                    document.getElementById('product-row-' + productId).remove();
                    updateTotal();
                    // Tampilkan pesan sukses atau lakukan tindakan lain yang diperlukan
                    alert("{{ __('messages.product_removed') }}");
                },
                error: function(request, status, error) {
                    // Tampilkan pesan error atau lakukan tindakan lain yang diperlukan
                    alert("{{ __('messages.error_removing_product') }}");
                }
            });
        }

        function checkCartUpdate() {
            if (cartUpdated) {
                alert("{{ __('messages.cart_updated_alert') }}");
            } else {
                // Lanjutkan ke halaman checkout atau lakukan tindakan lain
                window.location.href = '/checkout';
            }
        }

        function updateCart() {
            let items = {};
            document.querySelectorAll('.product-row').forEach(row => {
                let id = row.getAttribute('data-id');
                let quantity = row.querySelector('.product-quantity input').value;
                items[id] = quantity;
            });

            $.ajax({
                url: '{{ route('cart.update') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "items": items
                },
                success: function(result) {
                    // Tampilkan notifikasi sukses
                    alert(result.message);
                    cartUpdated = false; // Reset status perubahan
                    // Reload halaman untuk memperbarui subtotal dan total
                    location.reload();
                },
                error: function(request, status, error) {
                    // Tampilkan pesan error
                    alert("{{ __('messages.error_updating_cart') }}");
                }
            });
        }
    </script>
@endsection
