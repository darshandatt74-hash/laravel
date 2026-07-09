<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class LookupController extends Controller
{
    public function products()
    {
        return Product::all();
    }

    public function orders()
    {
        return Order::all();
    }

    public function users()
    {
        return User::all();
    }
}
