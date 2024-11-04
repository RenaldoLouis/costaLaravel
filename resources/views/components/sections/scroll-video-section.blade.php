<div id="trigger-scroll-video-{{ $index }}"></div>
<div id="scroll-video-section-{{ $index }}">
    <video id="scroll-video-{{ $index }}" width="100%" height="auto" muted>
        <source src="{{ asset($content['video']) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<!-- Push CSS khusus untuk ScrollVideoSection -->
@push('styles')
<style>
    /* Styles untuk scroll-video-section */
    #scroll-video-section-{{ $index }} {
        position: relative;
        height: 100vh;
        overflow: hidden;
        background-color: #000;
    }

    #scroll-video-section-{{ $index }} video {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: auto;
        height: 100%;
    }
</style>
@endpush

<!-- Push JavaScript khusus untuk ScrollVideoSection -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var controller = window.scrollMagicController;
        var video{{ $index }} = document.getElementById('scroll-video-{{ $index }}');
        var videoDuration{{ $index }} = 0; // Durasi video
        var videoSceneDuration{{ $index }} = $(window).height() * 2; // Durasi scene video (sesuaikan sesuai kebutuhan)

        // Pastikan video sudah siap sebelum mendapatkan durasinya
        video{{ $index }}.onloadedmetadata = function() {
            videoDuration{{ $index }} = video{{ $index }}.duration;

            // Scene untuk mengontrol video
            var videoScene{{ $index }} = new ScrollMagic.Scene({
                    triggerElement: '#trigger-scroll-video-{{ $index }}',
                    duration: videoSceneDuration{{ $index }},
                    triggerHook: 0,
                })
                .setPin('#scroll-video-section-{{ $index }}')
                @if(app()->environment('local'))
                    .addIndicators({ name: 'Video Scene {{ $index }}' }) // Diaktifkan hanya di lokal
                @endif
                .addTo(controller);

            // Update currentTime video berdasarkan scroll
            videoScene{{ $index }}.on('progress', function(e) {
                var scrollDirection = e.target.controller().info('scrollDirection');
                var progress = e.progress;
                var time = progress * videoDuration{{ $index }};

                // Jika scroll ke bawah, video maju
                // Jika scroll ke atas, video mundur
                if (scrollDirection === 'FORWARD') {
                    video{{ $index }}.currentTime = time;
                } else {
                    video{{ $index }}.currentTime = videoDuration{{ $index }} - time;
                }
            });

            // Pause video ketika meninggalkan scene
            videoScene{{ $index }}.on('leave', function(e) {
                video{{ $index }}.pause();
            });
        };
    });
</script>
@endpush
