<!-- Header Area Start Here -->
<!-- jika route adalah home, maka absolute-header -->
<header
    class="header-area padding-area header-sticky {{ request()->routeIs('home') ? 'absolute-header' : 'breadcrumb-bg' }}">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Logo Start -->
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="logo">
                    <a href="{{ url('/' . app()->getLocale()) }}"
                        style="font-size: 30px; font-weight: bold; color: #fff;">
                        <img src="{{ asset('storage' . setting('website_logo')) }}" alt="logo-image" style="height: 30px;">
                    </a>
                </div>
            </div>
            <!-- Logo End -->
            <!-- Menu Area Start Here -->
            <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                <nav>
                    <ul class="header-menu-list text-center">
                        <li class="active">
                            <a href="{{ url('/' . app()->getLocale()) }}">{{ __('header.home') }}</a>
                        </li>

                        {{-- @if (!empty($settings['is_products_megamenu']))
                        <li>
                            <a href="{{ route('products') }}">{{ __('header.products') }} <i class="fa fa-angle-down"></i></a>
                            <!--  Mega-Menu Start -->
                            <ul class="ht-dropdown megamenu">
                                @foreach ($categories as $c)
                                <!-- Single Column Start -->
                                <li>
                                    <ul>
                                        <li class="menu-tile"> {{ $c['name'] }} </li>
                                        @foreach ($c->products as $p)
                                        <li>
                                            <a href="{{ route('products.showBySlug', $p->slug) }}">
                                                {{ $p->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <!-- Single Column End -->
                                @endforeach
                            </ul>
                            <!-- Mega-Menu End -->
                        </li>
                        @endif --}}
                        <li>
                            <a href="{{ route('products', ['locale' => config('app.locale')]) }}">
                                {{ __('header.products') }} <i class="fa fa-angle-down"></i>
                            </a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown">
                                <!-- Loop Categories -->
                                @foreach ($categories as $category)
                                    <li class="{{ $category->children->isNotEmpty() ? 'has-submenu' : '' }}">
                                        <a
                                            href="{{ route('categories.showBySlug', ['slug' => $category['slug'], 'locale' => config('app.locale')]) }}">
                                            {{ $category['name'] }}
                                        </a>
                                        @if ($category->children->isNotEmpty())
                                            <ul class="submenu">
                                                @foreach ($category->children as $subCategory)
                                                    <li>
                                                        <a
                                                            href="{{ route('categories.showBySlug', ['slug' => $subCategory['slug'], 'locale' => config('app.locale')]) }}">
                                                            {{ $subCategory['name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>

                        <li>
                            <a href="#">{{ __('header.support') }} <i class="fa fa-angle-down"></i></a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown">
                                <li>
                                    <a
                                        href="{{ route('product-validation', ['locale' => config('app.locale')]) }}">{{ __('header.security_number') }}</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('affiliate', ['locale' => config('app.locale')]) }}">{{ __('header.affiliate_program') }}</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('become-reseller', ['locale' => config('app.locale')]) }}">{{ __('header.become_a_reseller') }}</a>
                                </li>
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>
                        {{-- <li>
                            <a href="{{ route('products') }}">{{ __('header.shop') }} <i class="fa fa-angle-down"></i></a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown">
                                <li>
                                    <a href="{{ route('products') }}">{{ __('header.all_products') }}</a>
                                </li>
                                @if (setting('is_shopping'))
                                <li>
                                    <a href="{{ route('cart') }}">{{ __('header.cart') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('checkout') }}">{{ __('header.checkout') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('wishlist') }}">{{ __('header.wishlist') }}</a>
                                </li>
                                @endif
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li> --}}
                        <!-- Blog -->
                        <li>
                            <a
                                href="{{ route('blogs', ['locale' => config('app.locale')]) }}">{{ __('header.blog') }}</a>
                        </li>
                        <!-- About Us -->
                        <li>
                            <a
                                href="{{ route('about-us', ['locale' => config('app.locale')]) }}">{{ __('header.about_us') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Menu Area End Here -->
            <!-- Cart Box Start Here -->
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="cart-box">
                    <ul>
                        <!-- Search Box Start Here -->
                        <li class="drodown-show">
                            <a href="#"><span class="icon icon-Search"></span></a>
                            <div class="dropdown categorie-search-box">
                                <form action="#">
                                    <input type="text" name="keyword" value="{{ request()->input('keyword') }}"
                                        placeholder="{{ __('header.search_our_catalog') }}">
                                    <button>
                                        <span class="icon icon-Search"></span>
                                    </button>
                                </form>
                            </div>
                        </li>
                        @if (setting('is_shopping'))
                            <!-- Categorie Search Box End Here -->
                            <li class="drodown-show">
                                <a href="#"><span class="icon icon-FullShoppingCart"></span><span
                                        class="total-pro">{{ count($cart) }}</span></a>
                                <ul class="dropdown cart-box-width">
                                    <li class="cart-list">
                                        @foreach ($cart as $item)
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a
                                                        href="{{ route('products.showBySlug', ['slug' => $item['slug'], 'locale' => config('app.locale')]) }}">
                                                        <img class="square-image"
                                                            src="{{ asset('storage' . $item['image']) }}"
                                                            alt="cart-image">
                                                    </a>
                                                    <span class="pro-quantity">{{ $item['quantity'] }}X</span>
                                                </div>
                                                <div class="cart-content">
                                                    <h6>
                                                        <a
                                                            href="{{ route('products.showBySlug', ['slug' => $item['slug'], 'locale' => config('app.locale')]) }}">{{ $item['name'] }}</a>
                                                    </h6>

                                                    @if ($item['discount_percentage'] == 0)
                                                        <span
                                                            class="cart-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</span>
                                                    @else
                                                        <span
                                                            class="cart-price">Rp{{ number_format($item['discount_fixed'], 0, ',', '.') }}</span>
                                                        <del
                                                            class="old-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</del>
                                                    @endif
                                                </div>
                                                <a class="del-icone" href="#">
                                                    <i class="ion-close"></i>
                                                </a>
                                            </div>
                                            <!-- Cart Box End -->
                                        @endforeach
                                    </li>
                                    <li>
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer">
                                            @php
                                                $total = collect($cart)->sum(function ($item) {
                                                    return ($item['discount_percentage'] > 0
                                                        ? $item['discount_fixed']
                                                        : $item['price']) * $item['quantity'];
                                                });
                                            @endphp
                                            <ul class="price-content">
                                                <li>{{ __('header.total') }}
                                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                                </li>
                                            </ul>
                                            <div class="cart-actions text-center">
                                                <a class="cart-checkout"
                                                    href="{{ route('checkout', ['locale' => config('app.locale')]) }}">{{ __('header.checkout') }}</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="drodown-show"><a href="#"><span class="icon icon-Settings"></span></a>
                            <!-- Currency & Language Selection Start -->
                            <ul class="dropdown cart-box-width currency-selector">
                                <li>
                                    @auth
                                        <h3>{{ __('header.hello') }}, {{ auth()->user()->name }}</h3>
                                        <ul>
                                            <li><a href="{{ route('account') }}">{{ __('header.my_account') }}</a></li>
                                            {{-- <li><a href="{{ route('wishlist') }}">{{ __('header.my_wishlist') }}</a></li> --}}
                                            <!-- histori pemesanan -->
                                            <li><a href="{{ route('users.my-orders') }}">{{ __('header.my_orders') }}</a>
                                            </li>
                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('header.logout') }}</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    @endauth
                                    @guest
                                        <h3>{{ __('header.my_account') }}</h3>
                                        <ul>
                                            <li><a
                                                    href="{{ route('signup', ['locale' => config('app.locale')]) }}">{{ __('header.register') }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('login', ['locale' => config('app.locale')]) }}">{{ __('header.login') }}</a>
                                            </li>
                                        </ul>
                                    @endguest
                                </li>
                            </ul>
                            <!-- Currency & Language Selection End -->
                        </li>
                        {{--
                        <!-- Language Flags Start Here -->
                        <li>
                            <a
                                href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => config('app.locale'), 'slug' => request()->slug]) }}">
                                @if ($locale == 'en')
                                    <img src="{{ asset('img/flag-en.png') }}" alt="English" title="English" style="height: 16px;" />
                                @else
                                    <img src="{{ asset('img/flag-id.png') }}" alt="Indonesia" title="Indonesia" style="height: 16px;" />
                                @endif
                                <span>{{ strtoupper(config('app.locale')) }}</span>
                            </a>
                        </li>
                        <!-- Language Flags End Here --> --}}


                        <!-- bendera ke img/flag-id.png dan img/flag-en.png, switcher untuk bahasa, kalo current, maka ada style border bottom warna putih -->
                        <li class="drodown-show"><a href="#">
                                {{ session('locale') == 'id' ? 'ID' : 'EN' }}
                            </a>
                            <!-- Currency & Language Selection Start -->
                            <ul class="dropdown cart-box-width currency-selector">

                                <li>
                                    <h3>{{ __('header.language') }}:</h3>
                                    <ul>
                                        @foreach (config('app.locales') as $locale => $language)
                                            <li>
                                                <?php
                                                // Dapatkan segmen URL sebagai array
                                                $segments = explode('/', trim(request()->path(), '/'));
                                                // Periksa jika segmen pertama adalah locale yang valid, jika ya ganti dengan locale baru
                                                if (in_array($segments[0], array_keys(config('app.locales')))) {
                                                    $segments[0] = $locale;
                                                } else {
                                                    // Jika segmen pertama bukan locale, tambahkan locale di awal
                                                    array_unshift($segments, $locale);
                                                }
                                                // Gabungkan kembali segmen-segmen untuk membentuk path baru
                                                $url = implode('/', $segments);
                                                ?>
                                                <a href="{{ url($url) }}">
                                                    @if ($locale == 'en')
                                                        <img src="{{ asset('img/flag-en.png') }}" alt="lang-icon">
                                                    @else
                                                        <img src="{{ asset('img/flag-id.png') }}" alt="lang-icon">
                                                    @endif
                                                    {{ $language }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <!-- Currency & Language Selection End -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Cart Box End Here -->
        </div>
        <!-- Row End -->
        <!-- Mobile Menu Start Here -->
        <div class="mobile-menu d-block d-lg-none">
            <nav>
                <ul>
                    <li>
                        <a href="{{ url('/' . app()->getLocale()) }}">{{ __('header.home') }}</a>
                    </li>
                    @if (!empty($settings['is_products_megamenu']))
                        <li>
                            <a
                                href="{{ route('products', ['locale' => config('app.locale')]) }}">{{ __('header.all_products') }}</a>
                            <!-- Mega-Menu Start -->
                            <ul class="submobile-mega-dropdown">
                                @foreach ($categories as $c)
                                    <!-- Single Column Start -->
                                    <li class="{{ $c->children->isNotEmpty() ? 'has-submenu' : '' }}">
                                        <a
                                            href="{{ route('categories.showBySlug', ['slug' => $c['slug'], 'locale' => config('app.locale')]) }}">
                                            {{ $c['name'] }}
                                        </a>
                                        @if ($c->children->isNotEmpty())
                                            <ul class="submenu">
                                                @foreach ($c->children as $subCategory)
                                                    <li>
                                                        <a
                                                            href="{{ route('categories.showBySlug', ['slug' => $subCategory['slug'], 'locale' => config('app.locale')]) }}">
                                                            {{ $subCategory['name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    <!-- Single Column End -->
                                @endforeach
                            </ul>
                            <!-- Mega-Menu End -->
                        </li>

                    @endif
                    <li>
                        <a href="#">{{ __('header.support') }}</a>
                        <!-- Home Version Dropdown Start -->
                        <ul>
                            <li>
                                <a
                                    href="{{ route('product-validation', ['locale' => config('app.locale')]) }}">{{ __('header.security_number') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('affiliate', ['locale' => config('app.locale')]) }}">{{ __('header.affiliate_program') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('become-reseller', ['locale' => config('app.locale')]) }}">{{ __('header.become_a_reseller') }}</a>
                            </li>
                        </ul>
                        <!-- Home Version Dropdown End -->
                    </li>

                    {{-- <li>
                        <a href="{{ route('products') }}">{{ __('header.shop') }}</a>
                        <!-- Home Version Dropdown Start -->
                        <ul>
                            <li>
                                <a href="{{ route('products') }}">{{ __('header.all_products') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('cart') }}">{{ __('header.cart') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('checkout') }}">{{ __('header.checkout') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('wishlist') }}">{{ __('header.wishlist') }}</a>
                            </li>
                        </ul>
                        <!-- Home Version Dropdown End -->
                    </li> --}}
                    <!-- Blog -->
                    <li>
                        <a
                            href="{{ route('blogs', ['locale' => config('app.locale')]) }}">{{ __('header.blog') }}</a>
                    </li>
                    <!-- About Us -->
                    <li>
                        <a
                            href="{{ route('about-us', ['locale' => config('app.locale')]) }}">{{ __('header.about_us') }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Mobile Menu End Here -->
    </div>
    <!-- Container End -->
</header>
<!-- Header Area End Here -->
