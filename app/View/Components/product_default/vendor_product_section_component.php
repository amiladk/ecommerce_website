<?php

namespace App\View\Components\product_default;

use Illuminate\View\Component;

class vendor_product_section_component extends Component
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
        return view('components.product_default.vendor_product_section_component');
    }
}
