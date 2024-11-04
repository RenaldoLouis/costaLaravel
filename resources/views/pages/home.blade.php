@extends('layouts.default')

@section('content')
    @php
        $locale = app()->getLocale();
    @endphp

    @include('layouts.slider')

    <!-- Category Area Start Here -->
    <div class="category-area">
        <div class="container-fluid">
            <div class="row g-3">
                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $featureTitle =
                            $locale == 'id' && !empty($homepage['homepage_feature' . $i . '_title_in'])
                                ? $homepage['homepage_feature' . $i . '_title_in']
                                : $homepage['homepage_feature' . $i . '_title'] ?? '';
                        $featureDescription =
                            $locale == 'id' && !empty($homepage['homepage_feature' . $i . '_description_in'])
                                ? $homepage['homepage_feature' . $i . '_description_in']
                                : $homepage['homepage_feature' . $i . '_description'] ?? '';
                        $featureImage =
                            $locale == 'id' && !empty($homepage['homepage_feature' . $i . '_image_in'])
                                ? $homepage['homepage_feature' . $i . '_image_in']
                                : $homepage['homepage_feature' . $i . '_image'] ?? '';
                    @endphp
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-rsp-3">
                        <div class="single-category" style="background-image: url('{{ asset('storage' . $featureImage) }}');">
                            <div class="category-text">
                                <h2>{{ $featureTitle }}</h2>
                                <p>{{ $featureDescription }}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Category Area End Here -->
    <!-- Service Area Start Here -->
    <div class="service-area ptb-80">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="section-title">
                <span>Experience</span>
                <h2>MASTER YOUR CRAFT </h2>
            </div>
            <!-- Section Title End Here -->
            <div class="row">
                @for ($i = 1; $i <= 4; $i++)
                    @php
                        $experienceIcon = $homepage['homepage_experience' . $i . '_icon'] ?? '';
                        $experienceTitle =
                            $locale == 'id' && !empty($homepage['homepage_experience' . $i . '_title_in'])
                                ? $homepage['homepage_experience' . $i . '_title_in']
                                : $homepage['homepage_experience' . $i . '_title'] ?? '';
                        $experienceDescription =
                            $locale == 'id' && !empty($homepage['homepage_experience' . $i . '_description_in'])
                                ? $homepage['homepage_experience' . $i . '_description_in']
                                : $homepage['homepage_experience' . $i . '_description'] ?? '';
                    @endphp
                    <div class="col-lg-3 col-sm-6 mb-all-40">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="fa-thin {{ $experienceIcon }} fa-4x"></i>
                            </div>
                            <div class="service-content">
                                <h4>{{ $experienceTitle }}</h4>
                                <p>{{ $experienceDescription }}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Big Image Area Start -->
            @php
                $bigImage =
                    $locale == 'id' && !empty($homepage['homepage_big_image_in'])
                        ? $homepage['homepage_big_image_in']
                        : $homepage['homepage_big_image'] ?? '';
            @endphp

            <div class="dron-img opacity-img mt-80">
                <a href="#">
                    <img class="mx-auto d-block img" src="{{ asset('storage' . $bigImage) }}" alt="services-img">
                </a>
            </div>

            <!-- Big Image Area End -->
        </div>
    </div>
    <!-- Service Area End  Here -->
    <!-- Slogan Area Start Here -->
    @php
        $shopNowDescription =
            $locale == 'id' && !empty($homepage['homepage_shop_now_description_in'])
                ? $homepage['homepage_shop_now_description_in']
                : $homepage['homepage_shop_now_description'] ?? '';
    @endphp

    <div class="slogan-area-start">
        <div class="container">
            <div class="slogan-content">
                <div class="slogan-img"></div>
                <div class="slogan-content text-center">
                    <p>{!! $shopNowDescription !!}</p>
                    <div class="small-btn">
                        <a
                            href="{{ route('products', [
                                'locale' => config('app.locale'),
                            ]) }}">shop
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slogan Area End Here -->
    <!-- Integrated Camera Area Start Here -->
    <div class="integrated-cam mt-50">
        <div class="container">
            <div class="border-style">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="camera-content camera-text">
                            <h3 class="same-header fix-width">COSTA <span>Alus-F</span> Fluid Head Smooth Rotate
                                Video Camera Head Tripod Monopod
                            </h3>
                            <p>COSTA ALUS F is a professional Fluid head designed to provide the best and most ideal
                                solution for DSLR HD users, featuring a sliding plate for optimal camera and lens
                                balance.
                            </p>
                            <!-- Camera Features Start Here -->
                            <div class="camera-features d-flex mt-30">
                                <div class="single-cam-features">
                                    <div class="cam-icon">
                                        <img src="img/features/f1.png" alt="camera-icon">
                                    </div>
                                    <div class="cam-content">
                                        <p>24<span>cm</span></p>
                                        <span>Diameter</span>
                                    </div>
                                </div>
                                <div class="single-cam-features">
                                    <div class="cam-icon">
                                        <img src="img/features/f2.png" alt="camera-icon">
                                    </div>
                                    <div class="cam-content">
                                        <p>10<span>Kg</span></p>
                                        <span>Max load</span>
                                    </div>
                                </div>
                                <div class="single-cam-features">
                                    <div class="cam-icon">
                                        <img src="img/features/f3.png" alt="camera-icon">
                                    </div>
                                    <div class="cam-content">
                                        <p>450<span>g</span></p>
                                        <span>Weight</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Camera Features End Here -->
                            <div class="small-btn icon-btn">
                                <a href="shop.html">view product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="main-camera opacity-img">
                            <a href="#"><img src="img/features/tripod-head.jpg" alt="features-img"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Facilities Start Here -->
            <div class="dron-facilities">
                <img src="{{ asset('img/banner/tripod-costa.jpg') }}" alt="banner-img" />
            </div>
            <!-- Facilities End Here -->
        </div>
    </div>
    <!-- Integrated Camera Area End Here -->
    <!-- Marketing Area Start Here -->
    <div class="marketing-area ptb-80"
        style="background: url(img/slider/image2.jpg) no-repeat center center fixed; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; ">
        <div class="container">
            <div class="marketing-text text-center">
                <h3>Shop Our Store</h3>
                @php
                    $shopOurStoreDescription =
                        $locale == 'id' && !empty($homepage['homepage_shop_our_store_description_in'])
                            ? $homepage['homepage_shop_our_store_description_in']
                            : $homepage['homepage_shop_our_store_description'] ?? '';
                @endphp
                <p>{!! $shopOurStoreDescription !!}</p>
            </div>
        </div>
    </div>

    <!-- homepage['homepage_content_box_title'] (h1) -->
    @if (!empty($homepage['homepage_content_box_title']) || !empty($homepage['homepage_content_box']))
        <div class="container pt-50 pb-50">
            <div class="section-title">
                <h1>{{ $homepage['homepage_content_box_title'] }}</h1>
            </div>
            <<div id="contentBox" style="margin: 0 auto; text-align: center;">
                <div id="shortContent">{{ Str::limit(strip_tags($homepage['homepage_content_box'], 500)) }}</div>
                <div id="fullContent" class="hidden-content">{!! $homepage['homepage_content_box'] !!}</div>
                <button id="readMoreBtn" class="btn btn-primary mt-2">Read More</button>
            </div>
        </div>
    @endif

    <!-- Marketing Area End Here -->
    <!-- Client Testmonial Area Start Here -->
    {{--
    <div class="testmonial-area dark-white-bg pb-80 pt-50">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="section-title">
                <span>Welcome to my personal presentation</span>
                <h2>What our Clients say</h2>
            </div>
            <!-- Section Title End Here -->
            <!-- Testmonial Active Start Here -->
            <div class="testmonial-active owl-carousel">
                <!-- Single Testmonial Start Here -->
                <div class="single-testmonial">
                    <div class="testmonial-img">
                        <img src="img/testmonial/t1.png" alt="testmonial-img">
                    </div>
                    <div class="testmonial-content">
                        <h4><a href="#">Teguh Prasetyo</a></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Saya sangat puas dengan produk tripod COSTA COLLECT TM-02. Penggunaannya sangat mudah dan
                            stabil. Cocok banget buat kebutuhan fotografi dan videografi saya. Selain itu, kualitas
                            materialnya juga sangat bagus dan tahan lama. Sangat merekomendasikan produk ini!</p>
                    </div>
                </div>
                <!-- Single Testmonial End Here -->
                <!-- Single Testmonial Start Here -->
                <div class="single-testmonial">
                    <div class="testmonial-img">
                        <img src="img/testmonial/t2.png" alt="testmonial-img">
                    </div>
                    <div class="testmonial-content">
                        <h4><a href="#">Dian Wandiana</a></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Produk lighting COSTA VL-64s RGB LED benar-benar mengejutkan! Banyak pilihan warna dan
                            efek yang bisa digunakan untuk menunjang hasil foto dan video yang lebih artistik. Saya
                            juga suka dengan fitur magnet yang kuat, membuatnya praktis dan mudah dipasang. Terima
                            kasih, COSTA!</p>
                    </div>
                </div>
                <!-- Single Testmonial End Here -->
                <!-- Single Testmonial Start Here -->
                <div class="single-testmonial">
                    <div class="testmonial-img">
                        <img src="img/testmonial/t3.png" alt="testmonial-img">
                    </div>
                    <div class="testmonial-content">
                        <h4><a href="#">Rizki Maulana</a></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Baru-baru ini saya membeli microphone COSTA Cm-U100 USB dan hasilnya luar biasa! Suara
                            yang dihasilkan jernih dan noise reductionnya sangat membantu. Desainnya juga sangat
                            elegan dan kokoh. Sangat cocok untuk keperluan rekaman, streaming, dan konferensi
                            online. Mantap!</p>
                    </div>
                </div>
                <!-- Single Testmonial End Here -->
                <!-- Single Testmonial Start Here -->
                <div class="single-testmonial">
                    <div class="testmonial-img">
                        <img src="img/testmonial/t4.png" alt="testmonial-img">
                    </div>
                    <div class="testmonial-content">
                        <h4><a href="#">Andika Putra</a></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Saya baru saja membeli COSTA ALUS-F Fluid Head dan sangat terkesan dengan kualitas dan
                            fungsionalitasnya. Mudah dipasang dan disesuaikan, serta memberikan gerakan yang sangat
                            halus untuk video yang saya buat. Sangat puas dengan hasilnya dan pasti akan
                            merekomendasikan produk ini kepada teman-teman saya yang berkecimpung di dunia fotografi
                            dan videografi!</p>
                    </div>
                </div>
                <!-- Single Testmonial End Here -->
            </div>
            <!-- Testmonial Active End Here -->
        </div>
    </div>
    --}}
    <!-- Client Testmonial Area End Here -->
    <!-- background abu2 muda, isinya 3 kolom berisi:
                                                    Where to Buy
                                                    Learn More

                                                    Support
                                                    Learn More

                                                    Record Confidently
                                                    Learn More

                                                    ukuran besar, ada icon di atasnya (fontawesome), ada tulisan di bawahnya, ada tombol learn more di bawah tulisan
                                                -->
    {{-- <div class="ultra-bright-screen integrated-cam ptb-80 where-to-buy-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 mb-sm-40">
                    <div class="camera-content text-center">
                        <i class="fa-sharp fa-regular fa-shopping-cart fa-4x mb-40"></i>
                        <h3 class="same-header">Where to Buy</h3>
                        <p>Find a local authorized COSTA dealer in your area. </p>
                        <div class="small-btn icon-btn">
                            <a href="shop.html">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 mb-sm-40">
                    <div class="camera-content text-center">
                        <i class="fa-sharp fa-regular fa-headset fa-4x mb-40"></i>
                        <h3 class="same-header">Support</h3>
                        <p>Get professional help from our experts. </p>
                        <div class="small-btn icon-btn">
                            <a href="shop.html">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 mb-sm-40">
                    <div class="camera-content text-center">
                        <i class="fa-sharp fa-regular fa-video fa-4x mb-40"></i>
                        <h3 class="same-header">Record Confidently</h3>
                        <p>Get professional help from our experts. </p>
                        <div class="small-btn icon-btn">
                            <a href="shop.html">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{--
<!-- Newsletter Area Start Here -->
<div class="newsletter-area pb-80 pt-80">
    <div class="container">
        <!-- Section Title Start Here -->
        <div class="section-title">
            <span>Newsletter</span>
            <h2>Sign up for Latest news</h2>
        </div>
        <!-- Section Title End Here -->
        <div class="newsletter-box text-center">
            <form action="#">
                <input class="subscribe" placeholder="Enter your email address here..." name="email" id="subscribe" type="text">
                <button type="submit" class="submit">subscribe!</button>
            </form>
        </div>
    </div>
</div>
<!-- Newsletter Area End Here -->
--}}

    <!-- Quick View Content Start -->
    <div class="main-product-thumbnail quick-thumb-content">
        <div class="container">
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <!-- Main Thumbnail Image Start -->
                                <div class="col-md-6 mb-all-40">
                                    <!-- Thumbnail Large Image start -->
                                    <div class="tab-content">
                                        <div id="thumb-menu-1" class="tab-pane fade show active">
                                            <a data-fancybox="images" href="img/products/p2.jpg"><img
                                                    src="img/products/p2.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb-menu-2" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/p5.jpg"><img
                                                    src="img/products/p5.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb-menu-3" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/p6.jpg"><img
                                                    src="img/products/p6.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb-menu-4" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/p7.jpg"><img
                                                    src="img/products/p7.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb-menu-5" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/p8.jpg"><img
                                                    src="img/products/p8.jpg" alt="product-view"></a>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Large Image End -->
                                    <!-- Thumbnail Image Start -->
                                    <div class="product-thumbnail">
                                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                            <a class="active" data-bs-toggle="tab" href="#thumb-menu-1"><img
                                                    src="img/thumbnail/th1.png" alt="product-thumbnail"></a>
                                            <a data-bs-toggle="tab" href="#thumb-menu-2"><img src="img/thumbnail/th2.png"
                                                    alt="product-thumbnail"></a>
                                            <a data-bs-toggle="tab" href="#thumb-menu-3"><img src="img/thumbnail/th3.png"
                                                    alt="product-thumbnail"></a>
                                            <a data-bs-toggle="tab" href="#thumb-menu-4"><img src="img/thumbnail/th4.png"
                                                    alt="product-thumbnail"></a>
                                            <a data-bs-toggle="tab" href="#thumb-menu-5"><img src="img/thumbnail/th5.png"
                                                    alt="product-thumbnail"></a>
                                        </div>
                                    </div>
                                    <!-- Thumbnail image end -->
                                </div>
                                <!-- Main Thumbnail Image End -->
                                <!-- Thumbnail Description Start -->
                                <div class="col-md-6">
                                    <div class="thubnail-desc ">
                                        <h3 class="product-header">Aspire Dron Model</h3>
                                        <ul class="rating-summary">
                                            <li class="rating-pro">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                            <li class="read-review"><a href="#">read reviews (1)</a></li>
                                            <li class="write-review"><a href="#">write review</a></li>
                                        </ul>
                                        <div class="pro-thumb-price mt-20">
                                            <p><span class="special-price">$84.17</span><del
                                                    class="old-price">$80.50</del></p>
                                        </div>
                                        <ul class="pro-list-features">
                                            <li>Ex Tax: <span class="ex-text">$68.71</span></li>
                                            <li>Brands <a href="#">Maron</a></li>
                                            <li>Product Code: <span>Drone</span></li>
                                            <li>Reward Points: <span>200</span></li>
                                            <li>Availability: <span>In Stock</span></li>
                                        </ul>
                                        <div class="product-size mtb-30 clearfix">
                                            <label>Size</label>
                                            <select class="">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                            </select>
                                        </div>
                                        <div class="quatity-stock">
                                            <label>Quantity</label>
                                            <ul class="d-flex flex-wrap">
                                                <li class="box-quantity">
                                                    <form action="#">
                                                        <input class="quantity" type="number" min="1"
                                                            value="1">
                                                    </form>
                                                </li>
                                                <li>
                                                    <button class="pro-cart">add to cart</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Thumbnail Description End -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Content End -->
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
