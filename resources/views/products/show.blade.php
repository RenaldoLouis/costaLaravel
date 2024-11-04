@extends('layouts.default')

@section('meta')
    <meta name="title"
        content="{{ session('locale') == 'id' ? $product->meta_title_in ?? $product->meta_title : $product->meta_title ?? $product->name }}">
    <meta name="description"
        content="{{ session('locale') == 'id' ? $product->meta_description_in ?? $product->meta_description : $product->meta_description ?? $product->summary }}">
    <meta name="keywords"
        content="{{ session('locale') == 'id' ? $product->meta_keywords_in ?? $product->meta_keywords : $product->meta_keywords }}">
    <meta property="og:title"
        content="{{ session('locale') == 'id' ? $product->meta_title_in ?? $product->meta_title : $product->meta_title ?? $product->name }}">
    <meta property="og:image" content="{{ asset('storage' . $product->image) }}">
    <meta property="og:description"
        content="{{ session('locale') == 'id' ? $product->meta_description_in ?? $product->meta_description : $product->meta_description ?? $product->summary }}">
    <meta property="og:url" content="{{ route('products.showBySlug', $product->slug) }}">
@endsection

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a
                        href="{{ route('home', [
                            'locale' => app()->getLocale(),
                        ]) }}">{{ __('products.breadcrumb_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a
                        href="{{ route('products', [
                            'locale' => config('app.locale'),
                        ]) }}">{{ __('products.breadcrumb_products') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a
                        href="{{ route('categories.showBySlug', [
                            'locale' => config('app.locale'),
                            'slug' => $product->category->slug,
                        ]) }}">{{ $product->category->name }}</a>
                <li class="breadcrumb-item active">
                    {{ session('locale') == 'id' ? $product->name_in ?? $product->name : $product->name }}
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail dark-white-bg ptb-80">
        <div class="container">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-md-6 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        <div id="thumb1" class="tab-pane fade show active">
                            <a data-fancybox="images" href="{{ asset('storage' . $product->image) }}">
                                <img loading="lazy" class="square-image" src="{{ asset('storage' . $product->image) }}"
                                    alt="product-view" id="product-img-{{ $product->id }}">
                            </a>
                        </div>
                        @foreach ($product->images as $key => $image)
                            @if ($key > 0)
                                <!-- Mulai dari image kedua -->
                                <div id="thumb{{ $key + 1 }}" class="tab-pane fade">
                                    <a data-fancybox="images" href="{{ asset('storage' . $image->image) }}">
                                        <img loading="lazy" class="square-image"
                                            src="{{ asset('storage' . $image->image) }}" alt="product-view">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Thumbnail Large Image End -->

                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu owl-carousel nav tabs-area">
                            <a class="active" data-bs-toggle="tab" href="#thumb1"><img loading="lazy" class="square-image"
                                    src="{{ asset('storage' . $product->image) }}" alt="product-thumbnail"></a>
                            @foreach ($product->images as $key => $image)
                                @if ($key > 0)
                                    <!-- Mulai dari image kedua -->
                                    <a data-bs-toggle="tab" href="#thumb{{ $key + 1 }}"><img loading="lazy"
                                            class="square-image" src="{{ asset('storage' . $image->image) }}"
                                            alt="product-thumbnail"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-md-6">
                    <div class="thubnail-desc ">
                        <h3 class="product-header">
                            {{ session('locale') == 'id' ? $product->name_in ?? $product->name : $product->name }}
                        </h3>
                        <div class="pro-thumb-price mt-20">
                            <p>
                                @if ($product['discount_percentage'] == 0)
                                    <span
                                        class="special-price">Rp{{ number_format($product['price'], 0, ',', '.') }}</span>
                                @else
                                    <span
                                        class="special-price">Rp{{ number_format($product['discount_fixed'], 0, ',', '.') }}</span>
                                    <del class="old-price">Rp{{ number_format($product['price'], 0, ',', '.') }}</del>
                                @endif
                                @if (!empty(auth()->user()->is_affiliate))
                                    <br>
                                    <span class="text-success ">
                                        <strong>{{ __('products.affiliate_commission') }}
                                            Rp{{ number_format($product->affiliate_commission, 0, ',', '.') }}</strong>

                                    </span>
                                @endif
                            </p>
                        </div>
                        <p class="pro-desc-details">
                            {{ session('locale') == 'id' ? $product->summary_in ?? $product->summary : $product->summary }}
                        </p>
                        @if (setting('is_shopping'))
                            <div class="quatity-stock">
                                <label>Quantity</label>
                                <ul class="d-flex flex-wrap">
                                    <li class="box-quantity">
                                        <form action="#">
                                            <input class="quantity" type="number" min="1" value="1"
                                                id="quantity-{{ $product->id }}">
                                        </form>
                                    </li>
                                    <li>
                                        <button
                                            onclick="addToCart({{ $product->id }}, document.getElementById('quantity-{{ $product->id }}').value)"
                                            class="pro-cart">add to cart</button>
                                        <!-- buy now -->
                                        <button
                                            onclick="buyNow({{ $product->id }}, document.getElementById('quantity-{{ $product->id }}').value)"
                                            class="pro-cart">buy now</button>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc dark-white-bg">
        <div class="container">
            <div class="thumb-desc-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content">
                            <div id="dtail" class="tab-pane fade show active">
                                {!! session('locale') == 'id'
                                    ? (!empty($product->description_in)
                                        ? $product->description_in
                                        : $product->description)
                                    : $product->description !!}
                            </div>
                        </div>
                        <!-- Product Thumbnail Tab Content End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->

    @if (count($relatedProducts))
        <!-- Related Products Start Here -->
        <div class="amazing-pro dark-white-bg ptb-80">
            <div class="container">
                <!-- Section Title Start Here -->
                <div class="section-title">
                    <span>Our products</span>
                    <h2>Related Products</h2>
                </div>
                <!-- Section Title End Here -->
                <!-- Related Products Activation Start Here -->
                <div class="feature-pro-active owl-carousel amazing-pro">
                    @foreach ($relatedProducts as $p)
                        <!-- Single Product Start -->
                        <div class="single-elomous-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{ route('products.showBySlug', $p->slug) }}">
                                    <img loading="lazy" class="square-image primary-img"
                                        src="{{ asset('storage' . $p->image) }}" alt="single-product">
                                    @php
                                        // secondary image dapet dari images
                                        $secondary_image = $p->images->first();
                                    @endphp
                                    @if (!empty($secondary_image->image))
                                        <img loading="lazy" class="square-image secondary-img"
                                            src="{{ asset('storage' . $secondary_image->image) }}" alt="single-product">
                                    @endif
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="{{ route('products.showBySlug', $p->slug) }}">{{ $p->name }}</a>
                                    </h4>
                                    <p>
                                        @if ($p['discount_percentage'] == 0)
                                            <span
                                                class="special-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</span>
                                        @else
                                            <span
                                                class="special-price">Rp{{ number_format($p['discount_fixed'], 0, ',', '.') }}</span>
                                            <del class="old-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</del>
                                        @endif
                                        @if (!empty(auth()->user()->is_affiliate))
                                            <br>
                                            <span class="text-success small">
                                                <strong>{{ __('products.affiliate_commission') }}
                                                    Rp{{ number_format($p['affiliate_commission'], 0, ',', '.') }}</strong>

                                            </span>
                                        @endif
                                    </p>
                                </div>
                                @if (setting('is_shopping'))
                                    <div class="pro-add-cart">
                                        <a href="#" title="Add to Cart">Add To Cart</a>
                                    </div>
                                @endif
                            </div>
                            <!-- Product Content End -->
                            <span class="sticker-sale">-5%</span>
                        </div>
                        <!-- Single Product End -->
                    @endforeach
                </div>
                <!-- Related Products Activation End Here -->
            </div>
        </div>
        <!-- Related Products End Here -->
    @endif

    @php
        $locale = app()->getLocale();
        $contentBoxTitle = $locale == 'en' ? $product->content_box_title : $product->content_box_title_in;
        $contentBox = $locale == 'en' ? $product->content_box : $product->content_box_in;
    @endphp

    @if (!empty($contentBoxTitle) || !empty($contentBox))
        <div class="container pt-50 pb-50">
            <div class="section-title">
                <h1>{{ $contentBoxTitle }}</h1>
            </div>
            <div id="contentBox">
                <div id="shortContent">{{ Str::limit(strip_tags($contentBox), 500) }}</div>
                <div id="fullContent" class="hidden-content">{!! $contentBox !!}</div>
                <button id="readMoreBtn" class="btn btn-primary mt-2">Read More</button>
            </div>
        </div>
    @endif

@endsection

@section('extend-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const readMoreBtn = document.getElementById('readMoreBtn');
            const fullContent = document.getElementById('fullContent');
            const shortContent = document.getElementById('shortContent');

            readMoreBtn.addEventListener('click', function () {
                if (fullContent.classList.contains('hidden-content')) {
                    fullContent.classList.remove('hidden-content');
                    shortContent.classList.add('hidden-content');
                    readMoreBtn.textContent = 'Read Less';
                } else {
                    fullContent.classList.add('hidden-content');
                    shortContent.classList.remove('hidden-content');
                    readMoreBtn.textContent = 'Read More';
                }
            });
        });
    </script>
@endsection
