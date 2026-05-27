@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Collection Maintenance</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Edit Product</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Update the product profile while preserving its storefront identity.</p>
        </div>

        <a href="/admin/products" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            Back
        </a>
    </header>

    <section class="grid gap-7 xl:grid-cols-[1fr_340px]">
        <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
            @csrf
            @method('PUT')

            <div class="border-b border-[#5a5139] p-7">
                <h2 class="font-serif text-3xl font-bold text-white">Product Details</h2>
                <p class="mt-2 text-sm text-[#cfc4aa]">Refine title, price, category and product story.</p>
            </div>

            <div class="space-y-7 p-7">
                <div class="grid gap-7 lg:grid-cols-2">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Product Name</span>
                        <input type="text" name="name" value="{{ $product->name }}" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>

                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Price</span>
                        <input type="number" name="price" value="{{ $product->price }}" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>
                </div>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Description</span>
                    <textarea name="description" rows="6" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">{{ $product->description }}</textarea>
                </label>

                <div class="grid gap-7 lg:grid-cols-2">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Category</span>
                        <select name="category" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                            <option class="bg-[#171b1c]" value="">Select Category</option>
                            <option class="bg-[#171b1c]" value="Headphones" @selected($product->category === 'Headphones')>Headphones</option>
                            <option class="bg-[#171b1c]" value="Fashion" @selected($product->category === 'Fashion')>Fashion</option>
                            <option class="bg-[#171b1c]" value="Shoes" @selected($product->category === 'Shoes')>Shoes</option>
                            <option class="bg-[#171b1c]" value="Watches" @selected($product->category === 'Watches')>Watches</option>
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Change Image</span>
                        <input type="file" name="image" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-[#f3c94f] file:px-4 file:py-2 file:text-xs file:font-bold file:uppercase file:tracking-[0.18em] file:text-[#141818] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>
                </div>

                <div class="flex flex-col gap-3 border-t border-[#2a3031] pt-7 sm:flex-row sm:items-center sm:justify-between">
                    <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                        Update Product
                    </button>
                    <a href="/admin/products" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

        <aside class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-6">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Current Presentation</p>
            <div class="mt-5 overflow-hidden rounded border border-[#2a3031] bg-[#101415]">
                @if($product->image)
                    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="h-72 w-full object-cover">
                @else
                    <div class="flex h-72 items-center justify-center">
                        <span class="font-serif text-4xl text-[#f3c94f]">M</span>
                    </div>
                @endif
            </div>
            <h3 class="mt-5 font-serif text-2xl font-bold text-white">{{ $product->name }}</h3>
            <p class="mt-2 text-sm text-[#cfc4aa]">{{ $product->category }}</p>
            <p class="mt-4 font-serif text-3xl font-bold text-[#f3c94f]">&#8377;{{ number_format($product->price, 2) }}</p>
        </aside>
    </section>
</div>

@endsection
