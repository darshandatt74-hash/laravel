<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;


class CartController extends Controller
{
    
    // CART PAGE
    
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $total = 0;

        foreach ($cartItems as $item) {

            $total += $item->product->price * $item->quantity;
        }

        return view('cart', compact('cartItems', 'total'));
    }

    public function plus(int $id)
{
    $cart = Cart::findOrFail($id);

    $cart->quantity += 1;

    $cart->save();

    return back();
}


public function minus(int $id)
{
    $cart = Cart::findOrFail($id);

    if($cart->quantity > 1){

        $cart->quantity -= 1;

        $cart->save();
    }

    return back();
}

    // ADD TO CART
    public function addToCart(int $id)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $id)
                    ->first();

        if ($cart) {

            $cart->quantity += 1;

            $cart->save();

        } else {

            Cart::create([

                'user_id' => Auth::id(),

                'product_id' => $id,

                'quantity' => 1,

            ]);
        }

        return redirect('/cart');
    }

    // REMOVE CART
    public function remove(int $id)
    {
        Cart::find($id)->delete();

        return redirect('/cart');
    }

    // UPDATE QUANTITY
    public function updateQuantity(Request $request, int $id)
    {
        $cart = Cart::find($id);

        $cart->quantity = $request->quantity;

        $cart->save();

        return redirect('/cart');
    }

    // PLACE ORDER
    public function placeOrder(Request $request)
    {
        $paymentMethod = $request->input('payment_method', 'Cash On Delivery');

        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price * $item->quantity,
                'payment_method' => $paymentMethod,
                'status' => 'Pending',
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect('/orders');
    }

}