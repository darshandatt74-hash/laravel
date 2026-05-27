@extends('layouts.user')

@section('content')

<div class="rounded-[2rem] border border-slate-800 bg-slate-950/95 p-10 shadow-2xl">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-10">
        <div>
            <h1 class="text-5xl font-extrabold text-white">Add Product</h1>
            <p class="mt-4 text-slate-400 text-xl">Create a new product for your store.</p>
        </div>
        <a href="/shop" class="inline-flex items-center justify-center rounded-full bg-yellow-400 px-7 py-4 text-lg font-bold text-slate-950 transition hover:bg-yellow-300">
            Back to Shop
        </a>
    </div>

    <form action="/products" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

            <input type="text"
                   name="name"
                   placeholder="Product Name"
                   class="w-full border p-4 rounded-xl mb-5">

            <textarea name="description"
                      placeholder="Description"
                      class="w-full border p-4 rounded-xl mb-5"></textarea>

            <input type="number"
                   name="price"
                   placeholder="Price"
                   class="w-full border p-4 rounded-xl mb-5">

            <input type="number"
                   name="stock"
                   placeholder="Stock"
                   class="w-full border p-4 rounded-xl mb-5">

            <input type="text"
                   name="category"
                   placeholder="Category"
                   class="w-full border p-4 rounded-xl mb-5">

            <input type="file"
                   name="image"
                   class="w-full border p-4 rounded-xl mb-5">

            <button class="bg-black text-white px-8 py-4 rounded-2xl text-xl">

                Add Product

            </button>

        </form>

    </div>

</body>
</html>