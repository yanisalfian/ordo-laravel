<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $category = request()->query('category');
        $location = request()->query('location');

        $data = [
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Soto Ayam & Lalapan Sembodo Roso",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Geprek 10.000",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Bebek Bumbu Ijo Cas Cis Cus",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Rumah Makan Aroma",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ],
            [
                "image" => "/images/placeholder.jpeg",
                "name" => "Pasar Tradisional Sawahku",
                "category" => "Supermarket",
                "status" => "Open",
                "address" => "Jln Bung Karno No. 56, Mataram - NTP 83127",
                "city" => "Mataram Kota"
            ]
        ];
        return view('welcome', compact('category', 'location', 'data'));
    }
}
