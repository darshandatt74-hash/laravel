<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);

        $order->status = "Completed";

        $order->save();

        return redirect('/admin/orders');
    }
}