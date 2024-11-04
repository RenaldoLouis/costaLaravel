@extends('layouts.showcase')

@section('content')
    <!-- Slider Area Start -->
    <div class="slider-area">
        <!-- Start Single Slide -->
        <div class="slide align-center-left fullscreen animation-style-01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content text-center" style="max-width: 100% !important; left: 0;">
                            <h6>Fluid Head Tripod Monopod Overhead Aluminium Alloy</h6>
                            <h1>COSTA COLLECT<br>TM-02</h1>
                            <div class="slide-btn small-btn">
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
            <video autoplay muted loop id="myVideo" style="width: 100%; position: absolute; top: 0; left: 0; z-index: -1;">
                <source src="{{ asset('video/tripod_video.mp4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        <!-- Slider Area End Here -->
    </div>

    @foreach ($sections as $index => $section)
        @switch($section->layout)
            @case('tripodBlackGradient')
                <x-sections.tripod-black-gradient :content="$section->content" :index="$index" />
            @break

            @case('headlineContainer')
                <x-sections.headline-container :content="$section->content" :index="$index" />
            @break

            @case('newSection')
                <x-sections.new-section :content="$section->content" :index="$index" />
            @break

            @case('anotherSection')
                <x-sections.another-section :content="$section->content" :index="$index" />
            @break

            @case('scrollVideoSection')
                <x-sections.scroll-video-section :content="$section->content" :index="$index" />
            @break

            @case('imageOverlaySection')
                <x-sections.image-overlay-section :image="$section->content['image']" :text="$section->content['text']" :gradientOverlay="$section->content['gradient_overlay']" :index="$index" />
            @break

            @case('sliderSection')
                <x-sections.slider-section :slides="$section->content['slides']" :index="$index" />
            @break

            @case('parallaxSection')
                <x-sections.parallax-section :image="$section->content['image']" :index="$index">
                    <div class="box2 blue">
                        <p>{{ $section->content['content_text'] }}</p>
                    </div>
                </x-sections.parallax-section>
            @break

            @default
                <!-- Tambahkan case default jika diperlukan -->
        @endswitch
    @endforeach

    <!-- Additional Spacer to Allow Scrolling -->
    <div class="spacer s10"></div>

    <style>
        /* Gaya untuk slider-area */
        .slider-area {
            position: relative;
        }

        /* Styles untuk scroll-video-section */
        [id^="scroll-video-section"] {
            position: relative;
            height: 100vh;
            overflow: hidden;
            background-color: #000;
        }

        [id^="scroll-video-section"] video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 100%;
        }
    </style>
@endsection
