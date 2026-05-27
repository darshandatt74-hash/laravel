@extends('layouts.user')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Private Collection</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Shop Products</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Browse the latest curated pieces and add your selections to cart.</p>
        </div>

        <a href="/cart" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            View Cart
        </a>
    </header>

    <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($products as $product)
            <article class="group overflow-hidden rounded-lg border border-[#2a3031] bg-[#171b1c] shadow-2xl transition duration-300 hover:-translate-y-1 hover:border-[#5a5139]">
                <div class="relative overflow-hidden bg-[#101415]">
                    @if($product->image)
                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                        <div class="flex h-64 items-center justify-center">
                            <span class="font-serif text-4xl text-[#f3c94f]">M</span>
                        </div>
                    @endif
                    <div class="absolute left-4 top-4 rounded border border-[#5a5139] bg-[#111616]/90 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#f3c94f]">
                        {{ $product->category }}
                    </div>
                </div>

                <div class="p-6">
                    <h2 class="font-serif text-2xl font-bold text-white">{{ $product->name }}</h2>
                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-[#cfc4aa]">{{ $product->description }}</p>

                    <div class="mt-6 flex flex-col gap-4 border-t border-[#2a3031] pt-5 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#9d947e]">Value</p>
                            <p class="mt-1 font-serif text-3xl font-bold text-[#f3c94f]">&#8377;{{ number_format($product->price, 2) }}</p>
                        </div>
                        <a href="/add-to-cart/{{ $product->id }}" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-[#141818] transition hover:bg-[#ffe37a]">
                            Add To Cart
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-10 text-center text-[#9d947e] sm:col-span-2 xl:col-span-3">
                No products are available right now.
            </div>
        @endforelse
    </section>
</div>

@endsection
