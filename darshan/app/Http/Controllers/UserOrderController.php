<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                ->latest()
                ->distinct('product_id')
                ->get();

    return view('orders', compact('orders'));
}

public function cancel(int $id)
{
    $order = Order::where('id', $id)
        ->where('user_id', Auth::id())
        ->where('status', 'Pending')
        ->firstOrFail();

    $order->status = 'Cancelled';
    $order->save();

    return back();
}

}
