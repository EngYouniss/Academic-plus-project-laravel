<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    /**
     * Create a new component instance.
     */
    public string $href;
    public string $text;
    public string $icon;
    public string $target;
    public function __construct($href, $text, $icon = '', $target = '_self')
    {
        $this->href = $href;
        $this->text = $text;
        $this->icon = $icon;
        $this->target = $target;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link');
    }
}
