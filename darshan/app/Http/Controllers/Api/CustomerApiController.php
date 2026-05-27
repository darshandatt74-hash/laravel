<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerApiController extends Controller
{
    // ALL CUSTOMERS
    public function index()
    {
        $customers = User::all();

        return response()->json([

            'status' => true,

            'message' => 'All Customers',

            'data' => $customers

        ]);
    }

    // ADD CUSTOMER
    public function store(Request $request)
    {
        $customer = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'city' => $request->city,

            'password' => bcrypt($request->password),

        ]);

        return response()->json([

            'status' => true,

            'message' => 'Customer Added',

            'data' => $customer

        ]);
    }

    // UPDATE CUSTOMER
    public function update(Request $request, $id)
    {
        $customer = User::find($id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->city = $request->city;

        $customer->save();

        return response()->json([

            'status' => true,

            'message' => 'Customer Updated',

            'data' => $customer

        ]);
    }

    // DELETE CUSTOMER
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json([

            'status' => true,

            'message' => 'Customer Deleted'

        ]);
    }
}