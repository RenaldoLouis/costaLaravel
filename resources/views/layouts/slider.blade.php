    <!-- Slider Area Start -->
    <div class="slider-area">
        <!-- Slider Area Start Here -->
        <div class="slider-activation owl-carousel">
            @foreach ($sliders as $slider)
                <!-- Start Single Slide -->
                <div class="slide align-center-left fullscreen animation-style-01"
                    style="background-image: url('{{ asset('storage' . (session('locale') == 'id' ? $slider->image_in ?? $slider->image : $slider->image)) }}');">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-content">
                                    <h6>{{ session('locale') == 'id' ? $slider->subtitle_in ?? $slider->subtitle : $slider->subtitle }}</h6>
                                    <h2>{{ session('locale') == 'id' ? $slider->title_in ?? $slider->title : $slider->title }}</h2>
                                    <p>{{ session('locale') == 'id' ? $slider->description_in ?? $slider->description : $slider->description }}</p>
                                    <div class="slide-btn small-btn">
                                        <a href="{{ $slider->link }}">Learn More</a>
                                        <a href="{{ url('/buy') }}">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            @endforeach

        </div>
        <!-- Slider Area End Here -->
    </div>
    <!-- Slider Area End -->
