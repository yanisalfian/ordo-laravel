<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class DiscountCard extends Component
{
    public $image;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $title)
    {
        $this->image = $image;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.discount-card');
    }
}
