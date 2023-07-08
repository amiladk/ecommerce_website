<?php

namespace App\View\Components\my_account_page;

use Illuminate\View\Component;

class order_sucess_component extends Component
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
        return view('components.my_account_page.order_sucess_component');
    }
}
