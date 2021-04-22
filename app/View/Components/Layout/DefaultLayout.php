<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class DefaultLayout extends Component
{
    public $title;
    public $category;
    public $location;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $category, $location)
    {
        $this->title = $title;
        $this->category = $category;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.default-layout');
    }
}
