<?php

namespace App\View\Components\my_account_page;

use Illuminate\View\Component;

class my_account_main_content_component extends Component
{
    public $customer;
    public $orders;
    public $accessToken;
    public $cities;
    public $addresses;
    public $numbers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($customer,$orders,$accessToken,$cities,$addresses,$numbers)
    {
        $this->$customer    = $customer;
        $this->$orders      = $orders;
        $this->$accessToken = $accessToken;
        $this->$cities      = $cities;
        $this->$addresses   = $addresses;
        $this->$numbers     = $numbers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my_account_page.my_account_main_content_component');
    }
}
