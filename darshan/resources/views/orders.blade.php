@extends('layouts.user')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Acquisition History</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">My Orders</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Track placed, completed and cancelled orders in one refined view.</p>
        </div>

        <a href="/shop" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
            Shop More
        </a>
    </header>

    <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($orders as $order)
            <article class="overflow-hidden rounded-lg border border-[#2a3031] bg-[#171b1c] shadow-2xl">
                @if($order->product && $order->product->image)
                    <img src="{{ asset('products/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="h-64 w-full object-cover">
                @else
                    <div class="flex h-64 w-full items-center justify-center bg-[#101415]">
                        <span class="font-serif text-4xl text-[#f3c94f]">M</span>
                    </div>
                @endif

                <div class="p-6">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="font-serif text-2xl font-bold text-white">{{ $order->product->name ?? 'Product Deleted' }}</h2>
                        <span class="rounded border px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] @if($order->status === 'Completed') border-emerald-500/40 bg-emerald-500/10 text-emerald-300 @elseif($order->status === 'Pending') border-[#f3c94f]/40 bg-[#f3c94f]/10 text-[#f3c94f] @else border-red-500/40 bg-red-500/10 text-red-300 @endif">
                            {{ $order->status }}
                        </span>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-4 border-t border-[#2a3031] pt-5">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Quantity</p>
                            <p class="mt-1 text-lg font-bold text-white">{{ $order->quantity }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Date</p>
                            <p class="mt-1 text-lg font-bold text-white">{{ $order->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Value</p>
                            <p class="mt-1 font-serif text-3xl font-bold text-[#f3c94f]">&#8377;{{ number_format($order->price, 2) }}</p>
                        </div>
                        @if($order->status == 'Pending')
                            <a href="/cancel-order/{{ $order->id }}" class="inline-flex items-center justify-center rounded border border-red-500/40 px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-red-300 transition hover:bg-red-500/10">
                                Cancel
                            </a>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-10 text-center text-[#9d947e] sm:col-span-2 xl:col-span-3">
                No orders found.
            </div>
        @endforelse
    </section>
</div>

@endsection
