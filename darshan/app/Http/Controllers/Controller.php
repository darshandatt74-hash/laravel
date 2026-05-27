<?php

namespace App\Http\Controllers;
use App\Models\Product;

abstract class Controller
{
    protected $shoes = null;
    protected $watches = null;
    protected $headphones = null;
    protected $fashion = null;
    

    public function __construct()
    {
        $this->shoes = Product::where('category', 'Shoes')->latest()->get();
        $this->watches = Product::where('category', 'Watches')->latest()->get();
        $this->headphones = Product::where('category', 'Headphones')->latest()->get();
        $this->fashion = Product::where('category', 'Fashion')->latest()->get();
    }
}
