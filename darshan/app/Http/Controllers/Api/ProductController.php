<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [

            [
                'id' => 1,
                'name' => 'Nike Shoes',
                'price' => 1999,
                'image' => 'shoe.jpg'
            ],

            [
                'id' => 2,
                'name' => 'Smart Watch',
                'price' => 2999,
                'image' => 'watch.jpg'
            ],

            [
                'id' => 3,
                'name' => 'Headphones',
                'price' => 1499,
                'image' => 'headphone.jpg'
            ]

        ];

        return response()->json($products);
    }
}