<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class SliderSection extends Component
{
    public $slides;
    public $index;

    /**
     * Create a new component instance.
     *
     * @param array $slides
     * @param int $index
     * @return void
     */
    public function __construct($slides, $index)
    {
        $this->slides = $slides;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.slider-section');
    }
}
