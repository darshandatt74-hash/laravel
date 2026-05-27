<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartApiController extends Controller
{
    // ALL CART ITEMS
    public function index()
    {
        $cart = Cart::with('product')->get();

        return response()->json([

            'status' => true,

            'message' => 'Cart Items',

            'data' => $cart

        ]);
    }

    // ADD TO CART
    public function store(Request $request)
    {
        $cart = Cart::create([

            'user_id' => $request->user_id,

            'product_id' => $request->product_id,

            'quantity' => $request->quantity,

        ]);

        return response()->json([

            'status' => true,

            'message' => 'Product Added To Cart',

            'data' => $cart

        ]);
    }

    // UPDATE CART
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);

        $cart->quantity = $request->quantity;

        $cart->save();

        return response()->json([

            'status' => true,

            'message' => 'Cart Updated',

            'data' => $cart

        ]);
    }

    // DELETE CART
    public function destroy($id)
    {
        Cart::find($id)->delete();

        return response()->json([

            'status' => true,

            'message' => 'Cart Item Deleted'

        ]);
    }
}