<?php

namespace App\View\Components\shop_page;

use Illuminate\View\Component;

class shop_default_category_component extends Component
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
        return view('components.shop_page.shop_default_category_component');
    }
}
