@extends('layouts.default')

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
            <video autoplay muted loop id="myVideo"
                style="width: 100%; position: absolute; top: 0; left: 0; z-index: -1;">
                <source src="{{ asset('video/tripod_video.mp4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        <!-- Slider Area End Here -->
    </div>

    <div id="trigger1"></div>
    <div id="tripod-black-gradient">
        <img src="{{ asset('img/tripod.png') }}" alt="tripod">
        <p id="p-scene1">Elevate Your Photography And Videography Experience With The Versatile And Sturdy COSTA COLLECT
            TM-02 Aluminum Alloy Camera Tripod Monopod, Featuring 360-Degree Rotation, Quick Release Plate, And Impressive
            Maximum Load Capacity Of 5kg, Designed For Both Amateurs And Professionals Alike.
        </p>
        <p id="p-scene2">Amazingly Versatile</p>
    </div>

    <div id="trigger2"></div>
    <div id="headline-container">
        <h2 id="headline">Steady Shots, Every Time - Unleash Your Creativity with Our Premium Tripods</h2>
    </div>

    <!-- Konten Baru Pertama -->
    <div id="trigger3"></div>
    <div id="new-section">
        <div class="content-wrapper">
            <h2>Discover Our New Features</h2>
            <p>Explore the latest advancements in our products that take your creativity to the next level.</p>
            <img src="{{ asset('img/placeholder1.png') }}" alt="New Features">
        </div>
    </div>

    <!-- Konten Baru Kedua -->
    <div id="trigger4"></div>
    <div id="another-section">
        <div class="content-wrapper">
            <h2>Experience Innovation</h2>
            <p>Our products are designed with the latest technology to enhance your workflow.</p>
            <img src="{{ asset('img/placeholder2.png') }}" alt="Innovation">
        </div>
    </div>

    <!-- Bagian Video Baru -->
    <div id="trigger5"></div>
    <div id="scroll-video-section">
        <video id="scroll-video" width="100%" height="auto" muted>
            <source src="{{ asset('video/tripod_video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Slider Area End -->

    <style>
        /* Gaya untuk slider-area */
        .slider-area {
            position: relative;
        }

        /* Gaya untuk tripod-black-gradient */
        #tripod-black-gradient {
            background: rgb(45, 45, 45);
            background: radial-gradient(circle, rgba(45, 45, 45, 1) 0%, rgba(0, 0, 0, 1) 65%);
            position: relative;
            height: 100vh;
            z-index: -2;
        }

        /* Gambar di tengah */
        #tripod-black-gradient img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 600px;
        }

        /* Paragraf di dalam #tripod-black-gradient */
        #tripod-black-gradient p {
            position: absolute;
            z-index: -1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            width: 50%;
            text-align: center;
            opacity: 0;
        }

        /* Headline */
        #headline-container {
            background-color: black;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 30%;
        }

        #headline-container h2 {
            color: white;
            font-weight: bold;
            font-size: 3rem;
            text-align: center;
            opacity: 0;
        }

        /* Styles untuk new-section */
        #new-section {
            position: relative;
            background-color: #f5f5f5;
            height: 100vh;
            overflow: hidden;
        }

        #new-section .content-wrapper {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
        }

        #new-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        #new-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        #new-section img {
            max-width: 100%;
            height: auto;
            opacity: 0;
        }

        /* Styles untuk another-section */
        #another-section {
            position: relative;
            background-color: #e0e0e0;
            height: 100vh;
            overflow: hidden;
        }

        #another-section .content-wrapper {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
        }

        #another-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        #another-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        #another-section img {
            max-width: 100%;
            height: auto;
            opacity: 0;
        }

        /* Styles untuk scroll-video-section */
        #scroll-video-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            background-color: #000;
        }

        #scroll-video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 100%;
        }
    </style>
@endsection

@section('extend-scripts')
    <!-- Sertakan skrip yang diperlukan -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <!-- ScrollMagic -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
    <!-- ScrollMagic GSAP Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js"></script>
    <!-- ScrollMagic Debug Indicator (Opsional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js"></script>

    <script>
        $(document).ready(function() {
            var controller = new ScrollMagic.Controller();

            // Animasi untuk tripod-black-gradient
            var pinTripodBlackGradient = new ScrollMagic.Scene({
                    triggerElement: '#trigger1',
                    duration: 2500,
                    triggerHook: 0,
                }).setPin('#tripod-black-gradient')
                .addIndicators({ name: '1 (duration: 2500)' }) // Diaktifkan
                .addTo(controller);

            var p1 = new ScrollMagic.Scene({
                    triggerElement: '#trigger1',
                    duration: 1000,
                    triggerHook: 0,
                }).setTween('#p-scene1', {
                    opacity: 1,
                    top: 170,
                })
                .addIndicators({ name: '2 (duration: 1000)' }) // Diaktifkan
                .addTo(controller);

            var p1Disappear = new ScrollMagic.Scene({
                    triggerElement: '#trigger1',
                    duration: 500,
                    offset: 1700,
                }).setTween('#p-scene1', {
                    opacity: 0,
                    top: 150,
                })
                .addIndicators({ name: '3 (duration: 500)' }) // Diaktifkan
                .addTo(controller);

            var p2 = new ScrollMagic.Scene({
                    triggerElement: '#trigger1',
                    duration: 1000,
                    offset: 1700,
                }).setTween('#p-scene2', {
                    opacity: 1,
                    top: 170,
                })
                .addIndicators({ name: '4 (duration: 1000)' }) // Diaktifkan
                .addTo(controller);

            // Animasi untuk headline-container
            var pinHeadlineContainer = new ScrollMagic.Scene({
                    triggerElement: '#trigger2',
                    duration: 1000,
                    triggerHook: 0,
                }).setPin('#headline-container')
                .addIndicators({ name: '5 (duration: 1000)' }) // Diaktifkan
                .addTo(controller);

            var headline = new ScrollMagic.Scene({
                    triggerElement: '#trigger2',
                    duration: 2000,
                    triggerHook: 0,
                }).setTween('#headline', {
                    scale: 5,
                })
                .addIndicators({ name: '6 (duration: 2000)' }) // Diaktifkan
                .addTo(controller);

            var headlineOpacity = new ScrollMagic.Scene({
                    triggerElement: '#trigger2',
                    duration: 500,
                    triggerHook: 0,
                }).setTween('#headline', {
                    opacity: 1,
                })
                .addIndicators({ name: '7 (duration: 500)' }) // Diaktifkan
                .addTo(controller);

            var headlineDisappear = new ScrollMagic.Scene({
                    triggerElement: '#trigger2',
                    duration: 500,
                    offset: 500,
                    triggerHook: 0,
                }).setTween('#headline', {
                    opacity: 0,
                })
                .addIndicators({ name: '8 (duration: 500)' }) // Diaktifkan
                .addTo(controller);

            // Animasi untuk new-section
            var pinNewSection = new ScrollMagic.Scene({
                    triggerElement: '#trigger3',
                    duration: 1000,
                    triggerHook: 0,
                }).setPin('#new-section')
                .addIndicators({ name: 'New Section Pin' }) // Diaktifkan
                .addTo(controller);

            var newSectionContent = new ScrollMagic.Scene({
                    triggerElement: '#trigger3',
                    duration: 500,
                    offset: 0,
                    triggerHook: 0,
                }).setTween('#new-section .content-wrapper', {
                    opacity: 1,
                    top: '50%',
                })
                .addIndicators({ name: 'New Section Content' }) // Diaktifkan
                .addTo(controller);

            var newSectionImage = new ScrollMagic.Scene({
                    triggerElement: '#trigger3',
                    duration: 500,
                    offset: 500,
                    triggerHook: 0,
                }).setTween('#new-section img', {
                    opacity: 1,
                    scale: 1,
                })
                .addIndicators({ name: 'New Section Image' }) // Diaktifkan
                .addTo(controller);

            // Animasi untuk another-section
            var pinAnotherSection = new ScrollMagic.Scene({
                    triggerElement: '#trigger4',
                    duration: 1000,
                    triggerHook: 0,
                }).setPin('#another-section')
                .addIndicators({ name: 'Another Section Pin' }) // Diaktifkan
                .addTo(controller);

            var anotherSectionContent = new ScrollMagic.Scene({
                    triggerElement: '#trigger4',
                    duration: 500,
                    offset: 0,
                    triggerHook: 0,
                }).setTween('#another-section .content-wrapper', {
                    opacity: 1,
                    top: '50%',
                })
                .addIndicators({ name: 'Another Section Content' }) // Diaktifkan
                .addTo(controller);

            var anotherSectionImage = new ScrollMagic.Scene({
                    triggerElement: '#trigger4',
                    duration: 500,
                    offset: 500,
                    triggerHook: 0,
                }).setTween('#another-section img', {
                    opacity: 1,
                    scale: 1,
                })
                .addIndicators({ name: 'Another Section Image' }) // Diaktifkan
                .addTo(controller);

            // Kontrol video berdasarkan scrolling (maju dan mundur)
            var video = document.getElementById('scroll-video');
            var videoDuration = video.duration; // Durasi video
            var videoSceneDuration = $(window).height() * 2; // Durasi scene video (sesuaikan sesuai kebutuhan)

            // Pastikan video sudah siap sebelum mendapatkan durasinya
            video.onloadedmetadata = function() {
                videoDuration = video.duration;

                // Scene untuk mengontrol video
                var videoScene = new ScrollMagic.Scene({
                        triggerElement: '#trigger5',
                        duration: videoSceneDuration,
                        triggerHook: 0,
                    })
                    .setPin('#scroll-video-section')
                    .addIndicators({ name: 'Video Scene' }) // Diaktifkan
                    .addTo(controller);

                // Update currentTime video berdasarkan scroll
                videoScene.on('progress', function(e) {
                    var scrollDirection = e.target.controller().info('scrollDirection');
                    var progress = e.progress;
                    var time = progress * videoDuration;

                    // Jika scroll ke bawah, video maju
                    // Jika scroll ke atas, video mundur
                    if (scrollDirection === 'FORWARD') {
                        video.currentTime = time;
                    } else {
                        video.currentTime = videoDuration - time;
                    }
                });

                // Pause video ketika meninggalkan scene
                videoScene.on('leave', function(e) {
                    video.pause();
                });
            };
        });
    </script>
@endsection
