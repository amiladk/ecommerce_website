<?php

namespace App\View\Components\product_default;

use Illuminate\View\Component;

class frequently_bought_together_component extends Component
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
        return view('components.product_default.frequently_bought_together_component');
    }
}
