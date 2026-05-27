<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show Products
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    // Add Product Page
    public function create()
    {
        return view('admin.products.create');
    }

    // Save Product
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect('/admin/products');
    }

    // Edit Page
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    // Update Product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('products'), $imageName);

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();

        return redirect('/admin/products');
    }

    // Delete Product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/products');
    }
}
