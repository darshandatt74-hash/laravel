@extends('layouts.user')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Member Status: Active</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Welcome, {{ Auth::user()->name }}</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Your private shopping overview, current activity, and recent acquisitions.</p>
        </div>

        <a href="/shop" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
            Explore Store
        </a>
    </header>

    <section class="grid gap-5 lg:grid-cols-3">
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Orders</p>
            <p class="mt-6 font-serif text-5xl font-bold text-white">{{ $ordersCount }}</p>
            <p class="mt-3 text-sm text-[#cfc4aa]">Your placed orders at a glance.</p>
        </article>
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Cart Items</p>
            <p class="mt-6 font-serif text-5xl font-bold text-[#f3c94f]">{{ $cartCount }}</p>
            <p class="mt-3 text-sm text-[#cfc4aa]">Items waiting for checkout.</p>
        </article>
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Products</p>
            <p class="mt-6 font-serif text-5xl font-bold text-white">{{ $productCount }}</p>
            <p class="mt-3 text-sm text-[#cfc4aa]">Available listings in the store.</p>
        </article>
    </section>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="flex flex-col gap-4 border-b border-[#5a5139] p-7 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-serif text-3xl font-bold text-white">Recent Orders</h2>
                <p class="mt-2 text-sm text-[#cfc4aa]">Latest activity from your account.</p>
            </div>
            <a href="/orders" class="text-xs font-bold uppercase tracking-[0.22em] text-[#f3c94f]">View All</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[680px] text-left">
                <thead class="text-[11px] uppercase tracking-[0.22em] text-[#e8dcc4]">
                    <tr class="border-b border-[#2a3031]">
                        <th class="px-7 py-4 font-medium">ID</th>
                        <th class="px-7 py-4 font-medium">Product</th>
                        <th class="px-7 py-4 font-medium">Status</th>
                        <th class="px-7 py-4 font-medium">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b border-[#2a3031] last:border-b-0">
                            <td class="px-7 py-5 font-bold text-white">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-7 py-5 text-[#e8dcc4]">{{ $order->product->name ?? 'Deleted Product' }}</td>
                            <td class="px-7 py-5">
                                <span class="rounded border px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] @if($order->status === 'Completed') border-emerald-500/40 bg-emerald-500/10 text-emerald-300 @elseif($order->status === 'Pending') border-[#f3c94f]/40 bg-[#f3c94f]/10 text-[#f3c94f] @else border-red-500/40 bg-red-500/10 text-red-300 @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-7 py-5 text-[#cfc4aa]">{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-7 py-10 text-center text-[#9d947e]">No recent orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
