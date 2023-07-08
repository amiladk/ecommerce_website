<?php

namespace App\View\Components\my_account_page;

use Illuminate\View\Component;

class address_card extends Component
{
    public $address;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($address)
    {
        $this->$address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my_account_page.address_card');
    }
}
