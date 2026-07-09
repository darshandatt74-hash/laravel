<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        $ordersCount = Order::where('user_id', Auth::id())->count();
        $cartCount = session('cart') ? count(session('cart')) : 0;
        $productCount = Product::count();

        return view('dashboard', compact('orders', 'ordersCount', 'cartCount', 'productCount'));
    }

    public function admin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard');
    }
}
