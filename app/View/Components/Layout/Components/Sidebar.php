<?php

namespace App\View\Components\Layout\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $itemList;
    public $locList;
    public $activeLoc;
    public $activeMenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($activeLoc, $activeMenu)
    {
        $this->activeLoc = $activeLoc == null ? 1 : $activeLoc;
        $this->activeMenu = $activeMenu == null ? 1 : $activeMenu;

        $this->itemList = [
            ['icon' => 'mdi-store', 'title' => 'Store Category'],
            ['icon' => 'mdi-view-parallel', 'title' => 'All'],
            ['icon' => 'mdi-store', 'title' => 'Supermarket'],
            ['icon' => 'mdi-store', 'title' => 'Warung and Restaurant'],
            ['icon' => 'mdi-coffee', 'title' => 'Coffee Shop'],
            ['icon' => 'mdi-book', 'title' => 'Most Booking'],
            ['icon' => 'mdi-book', 'title' => 'Masakan Jepang'],
        ];

        $this->locList = [
            'Store Location',
            'All',
            'Mataram Kota',
            'Denpasar Kota',
            'Surabaya Kota',
            'Jakarta Selatan',
            'Bandung Kota',
            'Bogor Kota',
            'Malang Kota',
            'Jogjakarta Kota',
            'Tulungagung Kota',
            'Kediri Kota',
            'Solo Kota',
            'Makassar Kota',
            'Samarinda Kota',
            'Banjarmasin Kota'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.components.sidebar');
    }
}
