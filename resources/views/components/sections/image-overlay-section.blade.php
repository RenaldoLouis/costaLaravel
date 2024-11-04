<!-- resources/views/components/sections/image-overlay-section.blade.php -->

<div id="trigger-image-overlay-{{ $index }}"></div>
<div id="image-overlay-section-{{ $index }}" class="image-overlay-section">
    <img src="{{ asset('storage' . $image) }}" alt="Overlay Image" class="overlay-image">

    <!-- Overlay Teks -->
    <div id="overlay-text-{{ $index }}" class="overlay-text">
        {{ $text }}
    </div>
</div>

<!-- Push CSS khusus untuk ImageOverlaySection -->
@push('styles')
    <style>
        /* Styles untuk ImageOverlaySection */
        #image-overlay-section-{{ $index }} {
            position: relative;
            width: 70%;
            margin: 50px auto;
            overflow: hidden;
        }

        /* Gambar Awal */
        #image-overlay-section-{{ $index }} .overlay-image {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Overlay Teks */
        #overlay-text-{{ $index }} {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 3rem;
            opacity: 0;
            line-height: 1.2;
        }

        /* Responsif */
        @media (max-width: 768px) {
            #overlay-text-{{ $index }} {
                font-size: 2rem;
            }

            #image-overlay-section-{{ $index }} {
                width: 90%;
            }
        }

        /* Styles untuk scroll-video-section */
        #scroll-video-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            background-color: #000;
        }

        #scroll-video-section video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 100%;
        }
    </style>
@endpush

<!-- Push JavaScript khusus untuk ImageOverlaySection -->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var controller = window.scrollMagicController;

            // Animasi Pin dan Pembesaran Gambar
            var pinImageOverlay{{ $index }} = new ScrollMagic.Scene({
                    triggerElement: '#trigger-image-overlay-{{ $index }}',
                    duration: 400,
                    triggerHook: 0.8, // Trigger di tengah viewport
                })
                // .setPin('#image-overlay-section-{{ $index }}')
                .setTween(TweenMax.to('#image-overlay-section-{{ $index }}', 1, {
                    scale: 1.43, // Pembesaran gambar
                    ease: Power1.easeInOut
                }))
                @if (app()->environment('local'))
                    .addIndicators({
                        name: 'Image Overlay Pin {{ $index }}'
                    }) // Diaktifkan hanya di lokal
                @endif
                .addTo(controller);

            // scene berikutnya, tahan image ketika trigger baru 0
            var pinImageOverlay2{{ $index }} = new ScrollMagic.Scene({
                    triggerElement: '#trigger-image-overlay-{{ $index }}',
                    duration: 400,
                    triggerHook: 0,
                })
                .setPin('#image-overlay-section-{{ $index }}')
                @if (app()->environment('local'))
                    .addIndicators({
                        name: 'Image Overlay Pin 2 {{ $index }}'
                    }) // Diaktifkan hanya di lokal
                @endif
                .addTo(controller);

            // Animasi Teks Fade In dari Atas ke Bawah
            var overlayTextTween{{ $index }} = TweenMax.to('#overlay-text-{{ $index }}', 1, {
                opacity: 1,
                y: 50, // Animasi dari atas ke bawah
                ease: Power1.easeOut
            });

            var overlayTextScene{{ $index }} = new ScrollMagic.Scene({
                    triggerElement: '#trigger-image-overlay-{{ $index }}',
                    offset: '60%', // Mulai animasi ketika 60% dari durasi scene
                    duration: 300,
                    triggerHook: 0.2,
                })
                .setTween(overlayTextTween{{ $index }})
                @if (app()->environment('local'))
                    .addIndicators({
                        name: 'Overlay Text {{ $index }}'
                    }) // Diaktifkan hanya di lokal
                @endif
                .addTo(controller);
        });
    </script>
@endpush
