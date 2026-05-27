@extends('layouts.user')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Selection Ledger</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Shopping Cart</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Review your selected pieces before placing the order.</p>
        </div>

        <a href="/shop" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            Continue Shopping
        </a>
    </header>

    @php $total = 0; @endphp

    <section class="space-y-5">
        @forelse ($cartItems as $item)
            @php
                $subtotal = $item->product->price * $item->quantity;
                $total += $subtotal;
            @endphp

            <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-5 sm:p-7">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                        @if($item->product->image)
                            <img src="{{ asset('products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="h-32 w-32 rounded border border-[#2a3031] object-cover">
                        @else
                            <div class="flex h-32 w-32 items-center justify-center rounded border border-[#2a3031] bg-[#101415]">
                                <span class="font-serif text-3xl text-[#f3c94f]">M</span>
                            </div>
                        @endif

                        <div>
                            <h2 class="font-serif text-3xl font-bold text-white">{{ $item->product->name }}</h2>
                            <p class="mt-2 text-sm text-[#cfc4aa]">&#8377;{{ number_format($item->product->price, 2) }} each</p>
                            <div class="mt-5 flex items-center gap-3">
                                <a href="/cart-minus/{{ $item->id }}" class="flex h-10 w-10 items-center justify-center rounded border border-red-500/40 text-xl font-bold text-red-300 transition hover:bg-red-500/10">-</a>
                                <div class="min-w-14 rounded border border-[#5a5139] px-5 py-2 text-center font-bold text-white">{{ $item->quantity }}</div>
                                <a href="/cart-plus/{{ $item->id }}" class="flex h-10 w-10 items-center justify-center rounded border border-emerald-500/40 text-xl font-bold text-emerald-300 transition hover:bg-emerald-500/10">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-left lg:text-right">
                        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#9d947e]">Subtotal</p>
                        <p class="mt-2 font-serif text-4xl font-bold text-[#f3c94f]">&#8377;{{ number_format($subtotal, 2) }}</p>
                        <a href="/remove-cart/{{ $item->id }}" class="mt-5 inline-flex items-center justify-center rounded border border-red-500/40 px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-red-300 transition hover:bg-red-500/10">
                            Remove
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-10 text-center text-[#9d947e]">
                Your cart is empty.
            </div>
        @endforelse
    </section>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="grid gap-7 p-7 lg:grid-cols-[1fr_1.4fr] lg:items-end">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Total</p>
                <h2 class="mt-3 font-serif text-5xl font-bold text-[#f3c94f]">&#8377;{{ number_format($total, 2) }}</h2>
            </div>

            <form action="/place-order" method="POST" class="grid gap-4 sm:grid-cols-[1fr_auto] sm:items-end">
                @csrf
                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Payment Method</span>
                    <select name="payment_method" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                        <option class="bg-[#171b1c]" value="Cash On Delivery">Cash On Delivery</option>
                        <option class="bg-[#171b1c]" value="Online Payment">Online Payment</option>
                    </select>
                </label>
                <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Place Order
                </button>
            </form>
        </div>
    </section>
</div>
@endsection
