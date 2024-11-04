<div id="trigger-tripod-{{ $index }}"></div>
<div id="tripod-black-gradient-{{ $index }}">
    <img src="{{ asset('storage'.$content['image']) }}" alt="tripod" >
    <p id="p-scene1-{{ $index }}">{{ $content['text1'] }}</p>
    <p id="p-scene2-{{ $index }}">{{ $content['text2'] }}</p>
</div>

<!-- Push CSS khusus untuk TripodBlackGradient -->
@push('styles')
<style>
    /* Styles untuk tripod-black-gradient */
    #tripod-black-gradient-{{ $index }} {
        background: rgb(45, 45, 45);
        background: radial-gradient(circle, rgba(45, 45, 45, 1) 0%, rgba(0, 0, 0, 1) 65%);
        position: relative;
        height: 100vh;
        z-index: -2;
    }

    /* Gambar di tengah */
    #tripod-black-gradient-{{ $index }} img {
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: auto;
        max-height: 500px;
    }

    /* Paragraf di dalam tripod-black-gradient */
    #tripod-black-gradient-{{ $index }} p {
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
</style>
@endpush

<!-- Push JavaScript khusus untuk TripodBlackGradient -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var controller = window.scrollMagicController;

        // Animasi Pin untuk tripod-black-gradient
        var pinTripod{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-tripod-{{ $index }}',
                duration: 2500,
                triggerHook: 0,
            })
            .setPin('#tripod-black-gradient-{{ $index }}')
            @if(app()->environment('local'))
                .addIndicators({ name: 'Tripod Black Gradient Pin {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi teks p-scene1
        var p1Tween{{ $index }} = TweenMax.to('#p-scene1-{{ $index }}', 1, {
            opacity: 1,
            top: 170,
            ease: Power1.easeOut
        });

        var p1Scene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-tripod-{{ $index }}',
                duration: 1000,
                triggerHook: 0,
            })
            .setTween(p1Tween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Tripod Text1 {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi p-scene1 Disappear
        var p1DisappearTween{{ $index }} = TweenMax.to('#p-scene1-{{ $index }}', 1, {
            opacity: 0,
            top: 150,
            ease: Power1.easeOut
        });

        var p1DisappearScene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-tripod-{{ $index }}',
                duration: 500,
                offset: 1700,
                triggerHook: 0,
            })
            .setTween(p1DisappearTween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Tripod Text1 Disappear {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);

        // Animasi p-scene2
        var p2Tween{{ $index }} = TweenMax.to('#p-scene2-{{ $index }}', 1, {
            opacity: 1,
            top: 170,
            ease: Power1.easeOut
        });

        var p2Scene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: '#trigger-tripod-{{ $index }}',
                duration: 1000,
                offset: 1700,
                triggerHook: 0,
            })
            .setTween(p2Tween{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Tripod Text2 {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
    });
</script>
@endpush
