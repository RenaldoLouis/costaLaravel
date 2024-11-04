<!-- resources/views/components/sections/parallax-section.blade.php -->

<div id="trigger-parallax-{{ $index }}" class="parallaxSectionWrapper">
    <div id="parallax-container-{{ $index }}" class="parallaxParent">
        <div style="background-image: url('{{ asset('storage' . $image) }}');"></div>
    </div>
    <div class="spacer s1">
        {{ $slot }}
    </div>
</div>

<!-- Push CSS khusus untuk ParallaxSection -->
@push('styles')
    <style type="text/css">
        /* Styles untuk parallax-section */
        .parallaxParent {
            height: 100vh;
            overflow: hidden;
            -webkit-perspective: 1000px;
            perspective: 1000px;
        }

        .parallaxParent>div {
            height: 200%;
            position: relative;
            top: -100%;
            background-size: cover;
            background-position: center;
        }

        .spacer.s0 {
            height: 0vh;
        }

        .spacer.s1 {
            height: 50vh;
        }

        .spacer.s2 {
            height: 100vh;
        }

        /* Tambahkan style tambahan jika diperlukan */
    </style>
@endpush

<!-- Push JavaScript khusus untuk ParallaxSection -->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var controller = window.scrollMagicController;

            // Animasi Parallax untuk parallax-container
            var parallaxScene{{ $index }} = new ScrollMagic.Scene({
                    triggerElement: "#trigger-parallax-{{ $index }}",
                    triggerHook: "onEnter",
                    duration: "200%"
                })
                .setTween("#parallax-container-{{ $index }} > div", {
                    y: "80%",
                    ease: Linear.easeNone
                })
            @if (app()->environment('local'))
                .addIndicators({
                    name: 'Parallax Scene {{ $index }}'
                }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
        });
    </script>
@endpush
