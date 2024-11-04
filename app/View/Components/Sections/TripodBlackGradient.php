<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class TripodBlackGradient extends Component
{
    public $content;
    public $index;

    public function __construct($content, $index)
    {
        $this->content = $content;
        $this->index = $index;
    }

    public function render()
    {
        return view('components.sections.tripod-black-gradient');
    }
}

