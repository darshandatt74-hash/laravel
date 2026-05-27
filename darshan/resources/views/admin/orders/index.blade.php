@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Acquisition Ledger</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Orders</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Review customer purchases, product details and completion status.</p>
        </div>

        <div class="rounded border border-[#2a3031] bg-[#171b1c] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white">
            Total: {{ $orders->count() }}
        </div>
    </header>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[860px] text-left">
                <thead class="text-[11px] uppercase tracking-[0.22em] text-[#e8dcc4]">
                    <tr class="border-b border-[#5a5139]">
                        <th class="px-7 py-5 font-medium">ID</th>
                        <th class="px-7 py-5 font-medium">Patron</th>
                        <th class="px-7 py-5 font-medium">Product</th>
                        <th class="px-7 py-5 font-medium">Value</th>
                        <th class="px-7 py-5 font-medium">Status</th>
                        <th class="px-7 py-5 text-right font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b border-[#2a3031] last:border-b-0 transition hover:bg-[#1c2223]">
                            <td class="px-7 py-5 font-bold text-white">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-7 py-5">
                                <div class="flex items-center gap-4">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#5a4921] text-xs font-bold text-[#f3c94f]">
                                        {{ strtoupper(substr($order->user->name ?? 'C', 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-bold text-white">{{ $order->user->name ?? 'Customer' }}</p>
                                        <p class="text-xs text-[#9d947e]">{{ $order->user->email ?? 'No email available' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-7 py-5 text-[#e8dcc4]">{{ $order->product->name ?? 'Product' }}</td>
                            <td class="px-7 py-5 font-serif text-2xl font-bold text-[#f3c94f]">&#8377;{{ number_format($order->price, 2) }}</td>
                            <td class="px-7 py-5">
                                @if($order->status == 'Pending')
                                    <span class="rounded border border-[#f3c94f]/40 bg-[#f3c94f]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#f3c94f]">
                                        Pending
                                    </span>
                                @else
                                    <span class="rounded border border-emerald-500/40 bg-emerald-500/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-emerald-300">
                                        Completed
                                    </span>
                                @endif
                            </td>
                            <td class="px-7 py-5 text-right">
                                @if($order->status == 'Pending')
                                    <a href="/complete-order/{{ $order->id }}" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-[#141818] transition hover:bg-[#ffe37a]">
                                        Complete
                                    </a>
                                @else
                                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#9d947e]">Closed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-7 py-10 text-center text-[#9d947e]">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection
