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

                        <h4 class="mt-3 mb-3">Products</h4>
                        <p>Below is the list of products that you can promote. You will get a commission for every
                            purchase made by your referral.</p>

                        <div class="products-list">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2">Product Name</th>
                                        <th scope="col" rowspan="2">Price</th>
                                        <th scope="col" colspan="2">Commission</th>
                                        <th scope="col" rowspan="2">Product Link</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Percentage</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('products.showBySlug', $product->slug) }}">
                                                    <img class="square-image"
                                                        src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}" style="width: 80px; height: 80px;"><br>
                                                    {{ $product->name }}
                                                </a>
                                            </td>
                                            <td>Rp{{ number_format($product->price, 0) }}</td>
                                            <td>{{ number_format(($product->affiliate_commission / $product->price) * 100, 2) }}
                                                %</td>
                                            <td>Rp{{ number_format($product->affiliate_commission, 0) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary get-link-btn"
                                                    data-productlink="{{ route('affiliate.link', [
                                                        'productId' => $product->id,
                                                        'userProductCode' => md5(auth()->user()->id . '-' . $product->id),
                                                    ]) }}"
                                                    data-toggle="modal">
                                                    Get Link
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-pagination :products="$products" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Orders Page End -->
@endsection

@section('extend-scripts')
    <script>
        $(document).ready(function() {
            $('.get-link-btn').on('click', function() {
                var productLink = $(this).data('productlink');

                $.ajax({
                    url: productLink,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            var affiliateLink = "{{ route('affiliate.link.redirect', '') }}/" +
                                response.affiliate_code;
                            copyToClipboard(affiliateLink);
                            alert("Link copied to clipboard!");
                        }
                    },
                    error: function(error) {
                        alert("Error occurred");
                    }
                });
            });

            function copyToClipboard(text) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(text).select();
                document.execCommand("copy");
                $temp.remove();
            }
        });
    </script>
@endsection
