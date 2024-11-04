@extends('layouts.default')

@section('content')

    <!-- Banner Area Start -->
    <div class="affiliate-banner">
        <img src="{{ asset('img/affiliate.png') }}" alt="Affiliate Banner" class="banner-image">
        <div class="banner-overlay-text">
            <h1>Program Afiliasi COSTA</h1>
            <p>Raih Penghasilan Sambil Berbagi Produk Favorit Anda!</p>
        </div>
    </div>
    <!-- Banner Area End -->


    <!-- Affiliate Program Area Start -->
    <div class="affiliate-program-area ptb-80">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="section-title text-center">
                <h2>{!! $affiliate['affiliate_title_en'] !!}</h2>
                <p>Raih Penghasilan Sambil Berbagi Produk Favorit Anda!</p>
            </div>
            <!-- Section Title End Here -->
            <!-- Affiliate Program Introduction Start -->
            <div class="affiliate-intro-area ptb-40">
                <div class="container">
                    <!-- Introduction Content Start Here -->
                    <div class="affiliate-intro-content">
                        {!! $affiliate['affiliate_description_en'] !!}
                    </div>
                    <!-- Introduction Content End Here -->
                </div>
            </div>
            <!-- Affiliate Program Introduction End -->
            <!-- Affiliate Program Content Start Here -->
            <div class="affiliate-program-content">
                <!-- Affiliate Benefits Start Here -->
                <div class="row">
                    <div class="col-lg-6">
                        {!! $affiliate['affiliate_benefits_en'] !!}
                    </div>
                    <!-- Affiliate Benefits End Here -->
                    <!-- Affiliate Requirements Start Here -->
                    <div class="col-lg-6">
                        {!! $affiliate['affiliate_requirements_en'] !!}
                    </div>
                    <!-- Affiliate Requirements End Here -->
                </div>
                <!-- Join Button Start Here -->
                <div class="affiliate-join-btn text-center mt-40">
                    <a href="{{ route('signup.type', ['type'=>'affiliator','locale'=>config('app.locale')]) }}" class="btn btn-large">JOIN PROGRAM</a>
                </div>
                <!-- Join Button End Here -->
            </div>
            <!-- Affiliate Program Content End Here -->
        </div>
    </div>
    <!-- Affiliate Program Area End -->
@endsection
