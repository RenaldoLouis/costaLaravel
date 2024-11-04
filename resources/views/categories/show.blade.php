@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a
                        href="{{ route('home', [
                            'locale' => config('app.locale'),
                        ]) }}">{{ __('categories.breadcrumb_home') }}</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('products', [
                            'locale' => config('app.locale'),
                        ]) }}">{{ __('categories.breadcrumb_products') }}</a>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Shop Page Start -->
    <div class="main-shop-page dark-white-bg ptb-80">
        <div class="container">
            <!-- Row End -->
            <form action="{{ route('products') }}" method="GET">
                <div class="row">
                    @include('products._sidebar')
                    <!-- Product Categorie List Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- judul category, image category, dan description -->
                        <div class="shop-top-bar mb-35">
                            <!-- di sebelah kiri ada image category -->
                            <div class="shop-top-bar-left"
                                style="display: flex; align-items: top; padding: 20px; background-color: #eeeeee;">
                                <div class="shop-tab" style="margin-right: 20px;">
                                    <img class="lazy" data-src="{{ asset('storage' . $category->image) }}"
                                        alt="category-image" style="width: 200px; height: auto;">
                                </div>
                                <!-- di sebelah kanan ada judul category dan description -->
                                <div class="shop-tab">
                                    <h3>{{ $category->name }}</h3>
                                    <p>{{ $category->description }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- tambahkan info "Hasil pencarian untuk " -->
                        @if (request('keyword'))
                            <div class="shop-top-bar mb-35">
                                <div class="select-shoing-wrap">
                                    <h3>{{ __('products.search_result_for', ['keyword' => request('keyword')]) }} </h3>
                                </div>
                            </div>
                        @endif

                        <!-- Grid & List View Start -->
                        <div
                            class="grid-list-top  universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                            <div class="grid-list-view d-flex align-items-center  mb-sm-15">
                                <ul class="nav tabs-area d-flex align-items-center">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#grid-view">
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#list-view">
                                            <i class="fa fa-list-ul"></i>
                                        </a>
                                    </li>
                                </ul>
                                <span
                                    class="show-items">{{ __('products.show_items', ['count' => $products->total()]) }}</span>
                            </div>
                            <!-- Toolbar Short Area Start -->
                            <div class="main-toolbar-sorter clearfix">
                                <div class="toolbar-sorter d-md-flex align-items-center">
                                    <label>{{ __('products.sort_by') }}</label>
                                    <select class="sorter wide" onchange="this.form.submit()" name="sort">
                                        <option value="" {{ request('sort') == '' ? 'selected' : '' }}>
                                            {{ __('products.relevance') }}</option>
                                        <option value="price asc" {{ request('sort') == 'price asc' ? 'selected' : '' }}>
                                            {{ __('products.price_low_to_high') }}</option>
                                        <option value="price desc" {{ request('sort') == 'price desc' ? 'selected' : '' }}>
                                            {{ __('products.price_high_to_low') }}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Toolbar Short Area End -->
                        </div>
                        <!-- Grid & List View End -->
                        <div class="shop-area mb-all-40">

                            <!-- Grid & List Main Area End -->
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade show active">
                                    <div class="row border-hover-effect ">
                                        @foreach ($products as $p)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <!-- Single Product Start -->
                                                <div class="single-elomous-product">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a
                                                            href="{{ route('products.showBySlug', ['slug' => $p['slug'], 'locale' => config('app.locale')]) }}">
                                                            <img class="lazy primary-img square-image"
                                                                id="product-img-{{ $p['id'] }}"
                                                                data-src="{{ asset('storage' . $p['image']) }}"
                                                                alt="single-product">
                                                            @if (!empty($p->images->first()))
                                                                <img class="lazy secondary-img square-image"
                                                                    data-src="{{ asset('storage' . $p->images->first()->image) }}"
                                                                    alt="single-product">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <div class="pro-info">
                                                            <h4><a
                                                                    href="{{ route('products.showBySlug', [
                                                                        'slug' => $p['slug'],
                                                                        'locale' => config('app.locale'),
                                                                    ]) }}">{{ $p['name'] }}</a>
                                                            </h4>
                                                            <p>
                                                                @if ($p['discount_percentage'] == 0)
                                                                    <span
                                                                        class="special-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</span>
                                                                @else
                                                                    <span
                                                                        class="special-price">Rp{{ number_format($p['discount_fixed'], 0, ',', '.') }}</span>
                                                                    <del
                                                                        class="old-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</del>
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
                                                                <a href="javascript:void(0)"
                                                                    onclick="addToCart({{ $p['id'] }})"
                                                                    title="Add to Cart">{{ __('products.add_to_cart') }}</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!-- Product Content End -->
                                                    @if ($p['discount_percentage'] != 0)
                                                        <span
                                                            class="sticker-new sticker-sale">{{ number_format($p['discount_percentage'], 0) }}%</span>
                                                    @endif
                                                </div>
                                                <!-- Single Product End -->
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Row End -->
                                </div>
                                <!-- #grid view End -->
                                <div id="list-view" class="tab-pane fade fix">
                                    @foreach ($products as $p)
                                        <!-- Single Product Start -->
                                        <div class="single-elomous-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a
                                                    href="{{ route('products.showBySlug', [
                                                        'slug' => $p['slug'],
                                                        'locale' => config('app.locale'),
                                                    ]) }}">
                                                    <img class="lazy primary-img square-image"
                                                        data-src="{{ asset('storage' . $p['image']) }}"
                                                        alt="single-product">
                                                    @if (!empty($p->images->first()))
                                                        <img class="lazy secondary-img square-image"
                                                            data-src="{{ asset('storage' . $p->images->first()->image) }}"
                                                            alt="single-product">
                                                    @endif
                                                </a>
                                                @if ($p['discount_percentage'] != 0)
                                                    <span
                                                        class="sticker-sale">{{ number_format($p['discount_percentage'], 0) }}%</span>
                                                @endif
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a
                                                            href="{{ route('products.showBySlug', [
                                                                'slug' => $p['slug'],
                                                                'locale' => config('app.locale'),
                                                            ]) }}">{{ $p['name'] }}</a>
                                                    </h4>
                                                    <p>{{ $p['summary'] }}</p>
                                                    <p>
                                                        @if ($p['discount_percentage'] == 0)
                                                            <span
                                                                class="special-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</span>
                                                        @else
                                                            <span
                                                                class="special-price">Rp{{ number_format($p['discount_fixed'], 0, ',', '.') }}</span>
                                                            <del
                                                                class="old-price">Rp{{ number_format($p['price'], 0, ',', '.') }}</del>
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
                                                <div class="pro-actions">
                                                    @if (setting('is_shopping'))
                                                        <div class="pro-add-cart">
                                                            <a href="javascript:void(0)"
                                                                onclick="addToCart({{ $p['id'] }})"
                                                                title="Add to Cart">{{ __('products.add_to_cart') }}</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    @endforeach
                                </div>
                                <!-- #list view End -->
                            </div>
                            <!-- Grid & List Main Area End -->
                        </div>
                        <x-pagination :products="$products" />
                        <!-- Shop Breadcrumb Area End -->
                    </div>
                    <!-- product Categorie List End -->
                </div>
            </form>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->

    @if (!empty($category->content_box_title) || !empty($category->content_box))
        <div class="container pt-50 pb-50">
            <div class="section-title">
                <h1>{{ $category->content_box_title }}</h1>
            </div>
            <div id="contentBox">
                <div id="shortContent">{{ Str::limit(strip_tags($category->content_box), 500) }}</div>
                <div id="fullContent" class="hidden-content">{!! $category->content_box !!}</div>
                <button id="readMoreBtn" class="btn btn-primary mt-2">Read More</button>
            </div>
        </div>
    @endif
@endsection

@section('extend-scripts')
    <script>
        document.querySelectorAll('input[name="categories[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                this.form.submit();
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll('img.lazy');

            if ('IntersectionObserver' in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove('lazy');
                            lazyImage.classList.add('loaded');
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                // Fallback untuk browser yang tidak mendukung IntersectionObserver
                lazyImages.forEach(function(lazyImage) {
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.classList.remove('lazy');
                    lazyImage.classList.add('loaded');
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const readMoreBtn = document.getElementById('readMoreBtn');
            const fullContent = document.getElementById('fullContent');
            const shortContent = document.getElementById('shortContent');

            readMoreBtn.addEventListener('click', function() {
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
