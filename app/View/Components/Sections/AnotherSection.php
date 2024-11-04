<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class AnotherSection extends Component
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
        return view('components.sections.another-section');
    }
}
