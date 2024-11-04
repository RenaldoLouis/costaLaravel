<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class ImageOverlaySection extends Component
{
    public $image;
    public $text;
    public $gradientOverlay;
    public $index;

    /**
     * Create a new component instance.
     *
     * @param string $image
     * @param string $text
     * @param string $gradientOverlay
     * @param int $index
     * @return void
     */
    public function __construct($image, $text, $gradientOverlay, $index)
    {
        $this->image = $image;
        $this->text = $text;
        $this->gradientOverlay = $gradientOverlay;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.image-overlay-section');
    }
}
