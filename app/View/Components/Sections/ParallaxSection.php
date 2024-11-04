<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class ParallaxSection extends Component
{
    public $image;
    public $index;

    /**
     * Create a new component instance.
     *
     * @param string $image
     * @param int $index
     * @return void
     */
    public function __construct($image, $index)
    {
        $this->image = $image;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.parallax-section');
    }
}
