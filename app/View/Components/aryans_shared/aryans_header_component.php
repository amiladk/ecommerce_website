<?php

namespace App\View\Components\aryans_shared;

use Illuminate\View\Component;

class aryans_header_component extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aryans_shared.aryans_header_component');
    }
}
