@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">New Collection Piece</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Add Product</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Create a refined catalog entry with complete product details and imagery.</p>
        </div>

        <a href="/admin/products" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            Back
        </a>
    </header>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="border-b border-[#5a5139] p-7">
            <h2 class="font-serif text-3xl font-bold text-white">Product Registry</h2>
            <p class="mt-2 text-sm text-[#cfc4aa]">All fields marked by the form are required for a polished storefront listing.</p>
        </div>

        <form action="/admin/products" method="POST" enctype="multipart/form-data" class="space-y-7 p-7">
            @csrf

            <div class="grid gap-7 lg:grid-cols-2">
                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Product Name</span>
                    <input type="text" name="name" placeholder="Enter product name" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Price</span>
                    <input type="number" name="price" placeholder="Enter price" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>
            </div>

            <label class="block">
                <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Description</span>
                <textarea name="description" rows="6" placeholder="Enter product description" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20"></textarea>
            </label>

            <div class="grid gap-7 lg:grid-cols-2">
                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Category</span>
                    <select name="category" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                        <option class="bg-[#171b1c]" value="">Select Category</option>
                        <option class="bg-[#171b1c]" value="Headphones">Headphones</option>
                        <option class="bg-[#171b1c]" value="Fashion">Fashion</option>
                        <option class="bg-[#171b1c]" value="Shoes">Shoes</option>
                        <option class="bg-[#171b1c]" value="Watches">Watches</option>
                    </select>
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Product Image</span>
                    <input type="file" name="image" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-[#f3c94f] file:px-4 file:py-2 file:text-xs file:font-bold file:uppercase file:tracking-[0.18em] file:text-[#141818] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>
            </div>

            <div class="flex flex-col gap-3 border-t border-[#2a3031] pt-7 sm:flex-row sm:items-center sm:justify-between">
                <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Add Product
                </button>
                <a href="/admin/products" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
                    Cancel
                </a>
            </div>
        </form>
    </section>
</div>

@endsection
