<!-- resources/views/components/sections/slider-section.blade.php -->

<div id="trigger-slider-{{ $index }}"></div>
<div id="slider-section-{{ $index }}">
    <div id="pinContainer-{{ $index }}">
        <div id="slideContainer-{{ $index }}">
            @foreach($slides as $slideIndex => $slide)
                <section class="panel" style="background-image: url('{{ asset('storage'.$slide['image']) }}');">
                    <b>{{ strtoupper($slide['title']) }}</b>
                </section>
            @endforeach
        </div>
    </div>
</div>

<!-- Push CSS khusus untuk SliderSection -->
@push('styles')
<style type="text/css">
    /* Styles untuk slider-section */
    #slider-section-{{ $index }} {
        width: 100%;
        height: 600px;
        overflow: hidden;
        -webkit-perspective: 1000px;
                perspective: 1000px;
    }

    #pinContainer-{{ $index }} {
        width: 100%;
        height: 600px;
        overflow: hidden;
        -webkit-perspective: 1000px;
                perspective: 1000px;
    }

    #slideContainer-{{ $index }} {
        width: 400%; /* untuk menampung 4 panel, masing-masing dengan lebar 100% */
        height: 500px;
        display: flex;
    }

    .panel {
        height: 500px;
        width: 25%; /* relatif terhadap parent -> 25% dari 400% = 100% dari lebar window */
        flex: 0 0 25%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 3rem;
        color: white;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    .panel b {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 20px;
        border-radius: 5px;
    }
</style>
@endpush

<!-- Push JavaScript khusus untuk SliderSection -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var controller = window.scrollMagicController;

        // Define movement of panels
        var wipeAnimation{{ $index }} = new TimelineMax()
            @foreach($slides as $slideIndex => $slide)
                @if($slideIndex > 0)
                    // Animate to the {{ $slide['title'] }} panel
                    .to("#slideContainer-{{ $index }}", 0.5, {z: -150, delay: 1})      // move back in 3D space
                    .to("#slideContainer-{{ $index }}", 1,   {x: "-{{ $slideIndex * 25 }}%"})    // move to the specific panel
                    .to("#slideContainer-{{ $index }}", 0.5, {z: 0})        // move back to origin in 3D space
                @endif
            @endforeach;

        // Create scene to pin and link animation
        var scene{{ $index }} = new ScrollMagic.Scene({
                triggerElement: "#trigger-slider-{{ $index }}",
                triggerHook: "onLeave",
                duration: "500%"
            })
            .setPin("#slider-section-{{ $index }}")
            .setTween(wipeAnimation{{ $index }})
            @if(app()->environment('local'))
                .addIndicators({ name: 'Slider Scene {{ $index }}' }) // Diaktifkan hanya di lokal
            @endif
            .addTo(controller);
    });
</script>
@endpush
