<?php

namespace App\View\Components;

use App\Models\SocialMedia as ModelsSocialMedia;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialMedia extends Component
{
    public $socialMedia;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // ambil data dari model SocialMedia
        $this->socialMedia = ModelsSocialMedia::where('is_active', true)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.social-media', [
            'socialMedia' => $this->socialMedia,
        ]);
    }
}
