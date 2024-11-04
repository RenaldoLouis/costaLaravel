@extends('layouts.default')

@section('content')
 <!-- Breadcrumb Area Start Here -->
 <div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Shop Page Start -->
<div class="main-shop-page dark-white-bg ptb-80">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1 mt-all-30">
                <div class="sidebar shop-sidebar">
                    <!-- Price Filter Options Start -->
                    <div class="search-filter mb-30">
                        <h3 class="sidebar-title">filter by price</h3>
                        <form action="#" class="slider-sidebar">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" class="amount-range" readonly>
                        </form>
                    </div>
                    <!-- Price Filter Options End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">categories</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="camera" type="checkbox">
                                <label class="form-check-label" for="camera">Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                <label class="form-check-label" for="GamePad">GamePad (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Product Size Start -->
                    <div class="size mb-30">
                        <h3 class="sidebar-title">size</h3>
                        <ul class="size-list sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="" id="small" type="checkbox">
                                <label class="form-check-label" for="small">S (6)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="medium" type="checkbox">
                                <label class="form-check-label" for="medium">M (9)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="large" type="checkbox">
                                <label class="form-check-label" for="large">L (8)</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Color Start -->
                    <div class="color mb-30">
                        <h3 class="sidebar-title">color</h3>
                        <ul class="color-option sidbar-style">
                            <li>
                                <span class="white"></span>
                                <a href="#">white (4)</a>
                            </li>
                            <li>
                                <span class="orange"></span>
                                <a href="#">Orange (2)</a>
                            </li>
                            <li>
                                <span class="blue"></span>
                                <a href="#">Blue (6)</a>
                            </li>
                            <li>
                                <span class="yellow"></span>
                                <a href="#">Yellow (8)</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Product Color End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">Components</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">cotton (4)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">polyester (4)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">Viscose (5)</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">Styles</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">casual (5)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">dressy (2)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">girly (8)</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie">
                        <h3 class="sidebar-title">Properties</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">colorful dress (2)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">maxi dress (2)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">midi dress (2)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">short dress (4) </label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" type="checkbox">
                                <label class="form-check-label">short sleve (3) </label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
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
                        <span class="show-items">There are 8 products.</span>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-md-flex align-items-center">
                            <label>Sort By:</label>
                            <select class="sorter wide">
                                <option value="Position">Relevance</option>
                                <option value="Product Name">Neme, A to Z</option>
                                <option value="Product Name">Neme, Z to A</option>
                                <option value="Price">Price low to heigh</option>
                                <option value="Price">Price heigh to low</option>
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
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p2.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone exclusive model</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$84.17</span>
                                                    <del class="old-price">$80.50</del>
                                                </p>
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
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p4.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model two</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$112.17</span>
                                                    <del class="old-price">$100.00</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p5.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p6.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model three</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$94.17</span>
                                                    <del class="old-price">$90.20</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-sale">-11%</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p7.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p8.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model four</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$94.17</span>
                                                    <del class="old-price">$90.99</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p2.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p9.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model five</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$85.17</span>
                                                    <del class="old-price">$80.50</del>
                                                </p>
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
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p4.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p3.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model six</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$84.17</span>
                                                    <del class="old-price">$80.50</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p2.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone exclusive model</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$84.17</span>
                                                    <del class="old-price">$80.50</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-5%</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p2.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone exclusive model</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$84.17</span>
                                                    <del class="old-price">$80.50</del>
                                                </p>
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
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <!-- Single Product Start -->
                                    <div class="single-elomous-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product-details.html">
                                                <img class="primary-img" src="img/products/p3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/p4.jpg" alt="single-product">
                                            </a>
                                            <div class="pro-actions-link">
                                                <a href="compare.html" title="Compare">
                                                    <span class="icon icon-MusicMixer"></span>
                                                </a>
                                                <a href="wishlist.html" title="Wishlist">
                                                    <span class="icon icon-Heart"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                    <span class="icon icon-Eye"></span>
                                                </a>
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
                                                <h4>
                                                    <a href="product-details.html">drone model two</a>
                                                </h4>
                                                <p>
                                                    <span class="special-price">$112.17</span>
                                                    <del class="old-price">$100.00</del>
                                                </p>
                                            </div>
                                            <div class="pro-add-cart">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane fade fix">
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p2.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-sale">-5%</span>
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
                                        <h4>
                                            <a href="product-details.html">drone exclusive model</a>
                                        </h4>
                                        <p>iPhone is a revolutionary new mobile phone that allows you to make a call
                                            by simply tapping a name or number in your address book, a favorites
                                            list, or a call log. It also automatically syncs all your..</p>
                                        <p>
                                            <span class="special-price">$84.17</span>
                                            <del class="old-price">$80.50</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->

                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p3.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p4.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-sale">-7%</span>
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
                                        <h4>
                                            <a href="product-details.html">drone model two</a>
                                        </h4>
                                        <p>Latest Intel mobile architecture Powered by the most advanced mobile processors
                                            from Intel, the new Core 2 Duo MacBook Pro is over 50% faster than the
                                            original Core Duo MacBook Pro and now sup..</p>
                                        <p>
                                            <span class="special-price">$112.17</span>
                                            <del class="old-price">$100.00</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p5.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p6.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-sale">-9%</span>
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
                                        <h4>
                                            <a href="product-details.html">Aria dron three</a>
                                        </h4>
                                        <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of battery
                                            life, the new iPod classic lets you enjoy up to 40,000 songs or up to
                                            200 hours of video or any combination where..</p>
                                        <p>
                                            <span class="special-price">$94.17</span>
                                            <del class="old-price">$90.20</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p7.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p8.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-sale">-9%</span>
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
                                        <h4>
                                            <a href="product-details.html">Infinity model four</a>
                                        </h4>
                                        <p>Latest Intel mobile architecture Powered by the most advanced mobile processors
                                            from Intel, the new Core 2 Duo MacBook Pro is over 50% faster than the
                                            original Core Duo MacBook Pro and now sup..</p>
                                        <p>
                                            <span class="special-price">$105.17</span>
                                            <del class="old-price">$90.99</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p7.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p8.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-new">-9%</span>
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
                                        <h4>
                                            <a href="product-details.html">drone model five</a>
                                        </h4>
                                        <p>Born to be worn. Clip on the worlds most wearable music player and take up
                                            to 240 songs with you anywhere. Choose from five colors including four
                                            new hues to make your musical fashion statement...</p>
                                        <p>
                                            <span class="special-price">$85.17</span>
                                            <del class="old-price">$80.50</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-elomous-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product-details.html">
                                        <img class="primary-img" src="img/products/p4.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/p3.jpg" alt="single-product">
                                    </a>
                                    <span class="sticker-sale">-4%</span>
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
                                        <h4>
                                            <a href="product-details.html">drone model six</a>
                                        </h4>
                                        <p>Born to be worn. Clip on the worlds most wearable music player and take up
                                            to 240 songs with you anywhere. Choose from five colors including four
                                            new hues to make your musical fashion statement...</p>
                                        <p>
                                            <span class="special-price">$84.17</span>
                                            <del class="old-price">$80.50</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="pro-add-cart">
                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                        </div>
                                        <div class="pro-actions-link">
                                            <a href="compare.html" title="Compare">
                                                <span class="icon icon-MusicMixer"></span>
                                            </a>
                                            <a href="wishlist.html" title="Wishlist">
                                                <span class="icon icon-Heart"></span>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" title="Quick View">
                                                <span class="icon icon-Eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- #list view End -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
                <!-- Shop Breadcrumb Area Start -->
                <div class="shop-breadcrumb-area border-default">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5">
                            <span class="show-items">Showing 1-12 of 13 item(s) </span>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-7">
                            <ul class="pfolio-breadcrumb-list text-center">
                                <li class="prev">
                                    <a href="#">
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>Previous</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li class="next">
                                    <a href="#">Next
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Shop Breadcrumb Area End -->
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->

@endsection

