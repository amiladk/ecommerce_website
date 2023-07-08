<?php

namespace App\View\Components\checkout_page;

use Illuminate\View\Component;

class checkout_main_content_component extends Component
{
    public $cities;
    public $login;
    public $number;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cities,$login,$number)
    {
        $this->$cities = $cities;
        $this->$login = $login;
        $this->$login = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkout_page.checkout_main_content_component');
    }
}
