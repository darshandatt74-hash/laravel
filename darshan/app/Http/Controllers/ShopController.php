<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    // HOME PAGE
    public function home()
    {
        $products = Product::latest()->take(6)->get();

        return view('home', compact('products'));
    }

    // SHOP PAGE
    public function index()
    {
        $products = Product::latest()->get();

        return view('shop', compact('products'));
    }

    // CATEGORY PAGE
    public function category(string $category)
    {
        // Keep DB values case-sensitive-safe by normalizing the requested category
        // (Assumes DB 'category' values are like: Shoes, Watches, Headphones, Fashion)
        $normalized = ucfirst(strtolower($category));

        $products = Product::where('category', $normalized)
            ->latest()
            ->get();

        return view('category', [
            'products' => $products,
            'category' => $normalized,
        ]);
    }
}
