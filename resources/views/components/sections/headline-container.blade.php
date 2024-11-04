<div id="trigger-headline-{{ $index }}"></div>
<div id="headline-container-{{ $index }}">
    <h2 id="headline-{{ $index }}">{{ $content['headline'] }}</h2>
</div>

<!-- Push CSS khusus untuk HeadlineContainer -->
@push('styles')
<style>
    /* Styles untuk headline-container */
    #headline-container-{{ $index }} {
        background-color: black;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 30%;
    }

    #headline-container-{{ $index }} h2 {
        color: white;
        font-weight: bold;
        font-size: 3rem;
        text-align: center;
        opacity: 0;
    }
</style>
@endpush

<!-- Push JavaScript khusus untuk HeadlineContainer -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pastikan ScrollMagic dan TweenMax sudah dimuat sebelum menjalankan script ini

        // Gunakan controller global yang diinisialisasi di layout utama
        var controller = window.scrollMagicController;

        // Animasi Pin untuk headline-container
        var pinHeadline{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-headline-{{ $index }}',
                duration: 1000,
                triggerHook: 0,
            })
            .setPin('#headline-container-{{ $index }}')
            @if(app()->environment('local'))
                .addIndicators({ name: 'Headline Container Pin {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Scale untuk headline
        var headlineScaleTween{{ $index }} = TweenMax.to('#headline-{{ $index }}', 1, {
            scale: 5,
            ease: Power1.easeOut
        });

        var headlineScaleScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-headline-{{ $index }}',
                duration: 2000,
                triggerHook: 0,
            })
            .setTween(headlineScaleTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Headline Scale {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Opacity untuk headline
        var headlineOpacityTween{{ $index }} = TweenMax.to('#headline-{{ $index }}', 1, {
            opacity: 1,
            ease: Power1.easeOut
        });

        var headlineOpacityScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-headline-{{ $index }}',
                duration: 500,
                triggerHook: 0,
            })
            .setTween(headlineOpacityTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Headline Opacity {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi Disappear untuk headline
        var headlineDisappearTween{{ $index }} = TweenMax.to('#headline-{{ $index }}', 1, {
            opacity: 0,
            ease: Power1.easeOut
        });

        var headlineDisappearScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-headline-{{ $index }}',
                duration: 500,
                offset: 500,
                triggerHook: 0,
            })
            .setTween(headlineDisappearTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Headline Disappear {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
    });
</script>
@endpush
