<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    public $label;
    public $name;
    public $placeholder;
    public $type;
    public $required;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder, $type = 'text', $required = false, $value = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-field');
    }
}
