<?php

namespace App\View\Components\product_default;

use Illuminate\View\Component;

class product_single_component extends Component
{
    public $slug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->$slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product_default.product_single_component');
    }
}
