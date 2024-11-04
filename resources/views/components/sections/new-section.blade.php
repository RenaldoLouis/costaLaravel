<!-- resources/views/components/sections/new-section.blade.php -->

<div id="trigger-new-section-{{ $index }}"></div>
<div id="new-section-{{ $index }}">
    <div class="content-wrapper">
        <h2>{{ $content['title'] }}</h2>
        <p>{{ $content['description'] }}</p>
        <img src="{{ asset('storage'.$content['image']) }}" alt="New Features">
    </div>
</div>

<!-- Push CSS khusus untuk NewSection -->
@push('styles')
<style>
    /* Styles untuk new-section */
    #new-section-{{ $index }} {
        position: relative;
        background-color: #f5f5f5;
        height: 100vh;
        overflow: hidden;
    }

    #new-section-{{ $index }} .content-wrapper {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        opacity: 0;
    }

    #new-section-{{ $index }} h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    #new-section-{{ $index }} p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    #new-section-{{ $index }} img {
        max-height: 300px;
        height: auto;
        opacity: 0;
    }
</style>
@endpush

<!-- Push JavaScript khusus untuk NewSection -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var controller = window.scrollMagicController;

        // Animasi Pin untuk new-section
        var pinNewSection{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-new-section-{{ $index }}',
                duration: 1000,
                triggerHook: 0,
            })
            .setPin('#new-section-{{ $index }}')
            @if(app()->environment('local'))
                .addIndicators({ name: 'New Section Pin {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Opacity dan Posisi untuk content-wrapper
        var newSectionContentTween{{ $index }} = TweenMax.to('#new-section-{{ $index }} .content-wrapper', 1, {
            opacity: 1,
            top: '50%',
            ease: Power1.easeOut
        });

        var newSectionContentScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-new-section-{{ $index }}',
                duration: 500,
                triggerHook: 0,
            })
            .setTween(newSectionContentTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'New Section Content {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Opacity untuk gambar
        var newSectionImageTween{{ $index }} = TweenMax.to('#new-section-{{ $index }} img', 1, {
            opacity: 1,
            scale: 1,
            ease: Power1.easeOut
        });

        var newSectionImageScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-new-section-{{ $index }}',
                duration: 500,
                offset: 500,
                triggerHook: 0,
            })
            .setTween(newSectionImageTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'New Section Image {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
    });
</script>
@endpush
