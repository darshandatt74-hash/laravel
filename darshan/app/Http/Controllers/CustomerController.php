<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::latest()->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function edit(int $id)
    {
        $customer = User::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, int $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $customer->id],
            'phone' => ['nullable', 'digits:10'],
            'city' => ['nullable', 'string', 'max:100'],
        ]);

        $customer->update($request->only(['name', 'email', 'phone', 'city']));

        return redirect('/admin/customers')->with('success', 'Customer profile updated successfully.');
    }

    public function destroy(int $id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect('/admin/customers')->with('success', 'Customer removed successfully.');
    }
}
