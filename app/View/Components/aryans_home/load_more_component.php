<?php

namespace App\View\Components\aryans_home;

use Illuminate\View\Component;

class load_more_component extends Component
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
        return view('components.aryans_home.load_more_component');
    }
}
