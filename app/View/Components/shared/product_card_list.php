<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;

class product_card_list extends Component
{
    public $product;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->$product = $product;
        $this->$class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.product_card_list');
    }
}
