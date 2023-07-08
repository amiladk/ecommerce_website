<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class SiteHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.site-header');
    }
}
