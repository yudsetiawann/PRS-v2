<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Team extends Component
{
    /**
     * Create a new component instance.
     */

     public $name, $role, $job, $desc, $image, $links;

    public function __construct($name, $role, $job, $desc, $image, $links = [])
    {
        $this->name = $name;
        $this->role = $role;
        $this->job = $job;
        $this->desc = $desc;
        $this->image = $image;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.team');
    }
}
