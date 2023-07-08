<?php

namespace App\View\Components\cart_page;

use Illuminate\View\Component;

class cart_page_content_component extends Component
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
        return view('components.cart_page.cart_page_content_component');
    }
}
