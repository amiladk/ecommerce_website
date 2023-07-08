<?php

namespace App\View\Components\contact_us_page;

use Illuminate\View\Component;

class contact_information_component extends Component
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
        return view('components.contact_us_page.contact_information_component');
    }
}
