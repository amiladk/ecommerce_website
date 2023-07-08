<?php

namespace App\View\Components\my_account_page;

use Illuminate\View\Component;

class add_new_card_component extends Component
{
    public $cities;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cities)
    {
        $this->$cities = $cities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my_account_page.add_new_card_component');
    }
}
