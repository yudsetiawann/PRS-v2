<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TechStack extends Component
{
    /**
     * Create a new component instance.
     */

     public $image, $stack, $descStack;

    public function __construct($image, $stack, $descStack)
    {
        $this->image = $image;
        $this->stack = $stack;
        $this->descStack = $descStack;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tech-stack');
    }
}
