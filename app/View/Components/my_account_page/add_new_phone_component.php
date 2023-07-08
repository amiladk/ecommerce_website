<?php

namespace App\View\Components\my_account_page;

use Illuminate\View\Component;

class add_new_phone_component extends Component
{
    public $number;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($number)
    {
        $this->$number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my_account_page.add_new_phone_component');
    }
}
