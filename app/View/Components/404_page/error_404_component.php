<?php

namespace App\View\Components\404_page;

use Illuminate\View\Component;

class error_404_component extends Component
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
        return view('components.404_page.error_404_component');
    }
}
