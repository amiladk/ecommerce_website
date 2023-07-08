<?php

namespace App\View\Components\home;

use Illuminate\View\Component;

class product_component extends Component
{
    public $name;
    public $category;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$category,$id)
    {
        $this->$name = $name;
        $this->$category = $category;
        $this->$id = $id;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.product_component');
    }
}
