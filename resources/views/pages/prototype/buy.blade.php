@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Product Details</li>
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
                            <a data-fancybox="images" href="img/products/p2.jpg"><img src="img/services/tripod.jpg"
                                    alt="product-view"></a>
                        </div>
                        <div id="thumb2" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/p5.jpg"><img src="img/features/tripod-head.jpg"
                                    alt="product-view"></a>
                        </div>
                        <div id="thumb3" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/p2.jpg"><img src="img/services/tripod.jpg"
                                    alt="product-view"></a>
                        </div>
                        <div id="thumb4" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/p5.jpg"><img src="img/features/tripod-head.jpg"
                                    alt="product-view"></a>
                        </div>
                        <div id="thumb5" class="tab-pane fade">
                            <a data-fancybox="images" href="img/products/p2.jpg"><img src="img/services/tripod.jpg"
                                    alt="product-view"></a>
                        </div>
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu owl-carousel nav tabs-area">
                            <a class="active" data-bs-toggle="tab" href="#thumb1"><img src="img/services/tripod.jpg"
                                    alt="product-thumbnail"></a>
                            <a data-bs-toggle="tab" href="#thumb2"><img src="img/features/tripod-head.jpg"
                                    alt="product-thumbnail"></a>
                            <a data-bs-toggle="tab" href="#thumb3"><img src="img/services/tripod.jpg"
                                    alt="product-thumbnail"></a>
                            <a data-bs-toggle="tab" href="#thumb4"><img src="img/features/tripod-head.jpg"
                                    alt="product-thumbnail"></a>
                            <a data-bs-toggle="tab" href="#thumb5"><img src="img/services/tripod.jpg"
                                    alt="product-thumbnail"></a>
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-md-6">
                    <div class="thubnail-desc ">
                        <h3 class="product-header">COSTA COLLECT TM-02 Fluid Head Tripod Monopod Overhead Aluminium Alloy</h3>
                        <ul class="rating-summary">
                            <li class="rating-pro">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </li>
                            <li><a href="#"><i class="fa-thin fa-comment fa-fw"></i> Read reviews (1)</a></li>
                            <li><a href="#"><i class="fa-thin fa-pencil-square fa-fw"></i> Write a review</a></li>
                        </ul>
                        <div class="pro-thumb-price mt-20">
                            <p><span class="special-price">Rp 645,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <p class="pro-desc-details">Elevate your photography and videography experience with the versatile and sturdy
                            COSTA COLLECT TM-02 Aluminum Alloy Camera Tripod Monopod, featuring 360-degree
                            rotation, quick release plate, and impressive maximum load capacity of 5kg,
                            designed for both amateurs and professionals alike.
                        </p>
                        {{--
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
                        <div class="color clearfix mb-30">
                            <label>color</label>
                            <ul class="color-list">
                                <li>
                                    <a class="black" href="#"></a>
                                </li>
                                <li>
                                    <a class="white" href="#"></a>
                                </li>
                                <li class="active">
                                    <a class="orange" href="#"></a>
                                </li>
                                <li>
                                    <a class="paste" href="#"></a>
                                </li>
                            </ul>
                        </div>
                        --}}
                        <div class="quatity-stock">
                            <label>Quantity</label>
                            <ul class="d-flex flex-wrap">
                                <li class="box-quantity">
                                    <form action="#">
                                        <input class="quantity" type="number" min="1" value="1">
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
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc dark-white-bg">
        <div class="container">
            <div class="thumb-desc-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li><a class="active" data-bs-toggle="tab" href="#dtail">Description</a></li>
                            <li><a data-bs-toggle="tab" href="#review">Reviews (1)</a></li>
                        </ul>
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content">
                            <div id="dtail" class="tab-pane fade show active">
                                <p>The COSTA COLLECT TM-02 Aluminium Alloy Camera Tripod Monopod offers durability and versatility for photographers and videographers. Made from durable aluminum alloy, it is compatible with various cameras and smartphones. The 360-degree rotatable center allows for easy adjustments and comfortable use, supporting both vertical and horizontal orientations. The adjustable head height and flip-lock system ensure convenient height customization, while the non-slip rubber feet provide stability. Additionally, it can be used as a monopod by removing the ball head. With a maximum load capacity of 5kg, it reaches a maximum height of 1850mm as a tripod and 1600mm as a monopod. The package includes the COSTA COLLECT TM-02 tripod, a bag for easy transportation.</p>
                            </div>
                            <div id="review" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div class="review">
                                    <div class="group-title">
                                        <h2>customer review</h2>
                                    </div>
                                    <h4 class="review-mini-title">elomus</h4>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Quality</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>elomus</label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>price</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Review by <a
                                                    href="https://themeforest.net/user/elomus">elomus</a></label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>value</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Posted on 12/20/18</label>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                </div>
                                <!-- Reviews End -->
                                <!-- Reviews Start -->
                                <div class="review mt-10">
                                    <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves
                                            T-shirt</span></h2>
                                    <p class="review-mini-title">your rating</p>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Quality</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>price</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>value</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                    <!-- Reviews Field Start -->
                                    <div class="riview-field mt-40">
                                        <form autocomplete="off" action="#">
                                            <div class="form-group">
                                                <label class="req" for="sure-name">Name</label>
                                                <input type="text" class="form-control" id="sure-name"
                                                    required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="subject">Title of review</label>
                                                <input type="text" class="form-control" id="subject"
                                                    required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="comments">Your Review</label>
                                                <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                            </div>
                                            <button type="submit" class="customer-btn">Submit</button>
                                        </form>
                                    </div>
                                    <!-- Reviews Field Start -->
                                </div>
                                <!-- Reviews End -->
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
    <!-- SmartWatch Product Start Here -->
    <div class="amazing-pro dark-white-bg ptb-80">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="section-title">
                <span>Our products</span>
                <h2>Related Products</h2>
            </div>
            <!-- Section Title End Here -->
            <!-- SmartWatch Product Activation Start Here -->
            <div class="feature-pro-active owl-carousel amazing-pro">
                <!-- Single Product Start -->
                <div class="single-elomous-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img class="primary-img" src="img/services/tripod.jpg" alt="single-product">
                            <img class="secondary-img" src="img/features/tripod-head.jpg" alt="single-product">
                        </a>
                        <div class="pro-actions-link">
                            <a href="compare.html" title="Compare"><span class="icon icon-MusicMixer"></span></a>
                            <a href="wishlist.html" title="Wishlist"><span class="icon icon-Heart"></span></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View"><span
                                    class="icon icon-Eye"></span></a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h4><a href="product-details.html">Tripod 1</a></h4>
                            <p><span class="special-price">Rp 640,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <div class="pro-add-cart">
                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-sale">-5%</span>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-elomous-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img class="primary-img" src="img/services/tripod.jpg" alt="single-product">
                            <img class="secondary-img" src="img/features/tripod-head.jpg" alt="single-product">
                        </a>
                        <div class="pro-actions-link">
                            <a href="compare.html" title="Compare"><span class="icon icon-MusicMixer"></span></a>
                            <a href="wishlist.html" title="Wishlist"><span class="icon icon-Heart"></span></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View"><span
                                    class="icon icon-Eye"></span></a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h4><a href="product-details.html">Tripod 2</a></h4>
                            <p><span class="special-price">Rp 640,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <div class="pro-add-cart">
                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">new</span>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-elomous-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img class="primary-img" src="img/services/tripod.jpg" alt="single-product">
                            <img class="secondary-img" src="img/features/tripod-head.jpg" alt="single-product">
                        </a>
                        <div class="pro-actions-link">
                            <a href="compare.html" title="Compare"><span class="icon icon-MusicMixer"></span></a>
                            <a href="wishlist.html" title="Wishlist"><span class="icon icon-Heart"></span></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View"><span
                                    class="icon icon-Eye"></span></a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h4><a href="product-details.html">Tripod 3</a></h4>
                            <p><span class="special-price">Rp 640,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <div class="pro-add-cart">
                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-sale">-11%</span>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-elomous-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img class="primary-img" src="img/services/tripod.jpg" alt="single-product">
                            <img class="secondary-img" src="img/features/tripod-head.jpg" alt="single-product">
                        </a>
                        <div class="pro-actions-link">
                            <a href="compare.html" title="Compare"><span class="icon icon-MusicMixer"></span></a>
                            <a href="wishlist.html" title="Wishlist"><span class="icon icon-Heart"></span></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View"><span
                                    class="icon icon-Eye"></span></a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product-details.html">Tripod 4</a></h4>
                            <p><span class="special-price">Rp 640,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <div class="pro-add-cart">
                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">new</span>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-elomous-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img class="primary-img" src="img/services/tripod.jpg" alt="single-product">
                            <img class="secondary-img" src="img/features/tripod-head.jpg" alt="single-product">
                        </a>
                        <div class="pro-actions-link">
                            <a href="compare.html" title="Compare"><span class="icon icon-MusicMixer"></span></a>
                            <a href="wishlist.html" title="Wishlist"><span class="icon icon-Heart"></span></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View"><span
                                    class="icon icon-Eye"></span></a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h4><a href="product-details.html">Tripod 5</a></h4>
                            <p><span class="special-price">Rp 640,000</span><del class="old-price">Rp 800,000</del></p>
                        </div>
                        <div class="pro-add-cart">
                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-sale">-5%</span>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- SmartWatch Product Activation End Here -->
        </div>
    </div>
    <!-- SmartWatch Product End Here -->
@endsection
