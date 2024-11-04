<!-- resources/views/components/sections/another-section.blade.php -->

<div id="trigger-another-section-{{ $index }}"></div>
<div id="another-section-{{ $index }}">
    <div class="content-wrapper">
        <h2>{{ $content['title'] }}</h2>
        <p>{{ $content['description'] }}</p>
        <img src="{{ asset('storage'.$content['image']) }}" alt="Innovation">
    </div>
</div>

<!-- Push CSS khusus untuk AnotherSection -->
@push('styles')
<style>
    /* Styles untuk another-section */
    #another-section-{{ $index }} {
        position: relative;
        background-color: #e0e0e0;
        height: 100vh;
        overflow: hidden;
    }

    #another-section-{{ $index }} .content-wrapper {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        opacity: 0;
    }

    #another-section-{{ $index }} h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    #another-section-{{ $index }} p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    #another-section-{{ $index }} img {
        max-width: 100%;
        height: 300px;
        opacity: 0;
    }
</style>
@endpush

<!-- Push JavaScript khusus untuk AnotherSection -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var controller = window.scrollMagicController;

        // Animasi Pin untuk another-section
        var pinAnotherSection{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-another-section-{{ $index }}',
                duration: 1000,
                triggerHook: 0,
            })
            .setPin('#another-section-{{ $index }}')
            @if(app()->environment('local'))
                .addIndicators({ name: 'Another Section Pin {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Opacity dan Posisi untuk content-wrapper
        var anotherSectionContentTween{{ $index }} = TweenMax.to('#another-section-{{ $index }} .content-wrapper', 1, {
            opacity: 1,
            top: '50%',
            ease: Power1.easeOut
        });

        var anotherSectionContentScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-another-section-{{ $index }}',
                duration: 500,
                triggerHook: 0,
            })
            .setTween(anotherSectionContentTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Another Section Content {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Opacity untuk gambar
        var anotherSectionImageTween{{ $index }} = TweenMax.to('#another-section-{{ $index }} img', 1, {
            opacity: 1,
            scale: 1,
            ease: Power1.easeOut
        });

        var anotherSectionImageScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-another-section-{{ $index }}',
                duration: 500,
                offset: 500,
                triggerHook: 0,
            })
            .setTween(anotherSectionImageTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Another Section Image {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
    });
</script>
@endpush
