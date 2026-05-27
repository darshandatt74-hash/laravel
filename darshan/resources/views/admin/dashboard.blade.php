@extends('layouts.admin')

@section('content')
@php
    $ordersCount = \App\Models\Order::count();
    $productsCount = \App\Models\Product::count();
    $patronsCount = \App\Models\User::count();
    $revenue = \App\Models\Order::all()->sum(fn ($order) => (float) $order->price * (int) ($order->quantity ?? 1));
    $recentOrders = \App\Models\Order::with(['user', 'product'])->latest()->take(4)->get();
    $topProduct = \App\Models\Product::latest()->first();
    $pendingOrders = \App\Models\Order::where('status', 'Pending')->count();
    $completedOrders = \App\Models\Order::where('status', 'Completed')->count();
@endphp

<div class="space-y-9">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">System Status: Optimal</p>
            <h1 class="mt-3 font-serif text-4xl font-bold leading-tight text-white sm:text-5xl">Maison Overview</h1>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="/admin/products" class="flex h-12 w-12 items-center justify-center rounded-xl border border-[#2d3435] bg-[#171c1d] text-[#f3c94f] transition hover:border-[#f3c94f]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.3-4.3M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4Z" />
                </svg>
            </a>
            <a href="/admin/orders" class="flex h-12 w-12 items-center justify-center rounded-xl border border-[#2d3435] bg-[#171c1d] text-[#f3c94f] transition hover:border-[#f3c94f]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 0 1-6 0" />
                </svg>
            </a>
            <div class="hidden h-9 w-px bg-[#5a5139] sm:block"></div>
            <div class="rounded-xl border border-[#2d3435] bg-[#171c1d] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-white">
                {{ now()->format('M d, Y') }}
            </div>
        </div>
    </header>

    <section class="grid gap-5 lg:grid-cols-3">
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8 shadow-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Total Revenue</p>
            <div class="mt-6 flex items-end gap-2">
                <p class="font-serif text-4xl font-bold text-[#f3c94f]">&#8377;{{ number_format($revenue, 2) }}</p>
                <span class="pb-1 text-xs font-bold text-emerald-400">+22%</span>
            </div>
            <div class="mt-7 h-1 rounded-full bg-[#3a3f40]">
                <div class="h-1 w-2/3 rounded-full bg-[#f3c94f]"></div>
            </div>
        </article>

        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8 shadow-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Total Orders</p>
            <div class="mt-6 flex items-end gap-2">
                <p class="font-serif text-4xl font-bold text-white">{{ number_format($ordersCount) }}</p>
                <span class="pb-1 text-xs font-bold text-emerald-400">+8.4%</span>
            </div>
            <div class="mt-7 flex justify-between text-[10px] uppercase tracking-[0.18em] text-[#e8dcc4]">
                <span>Pending: {{ $pendingOrders }}</span>
                <span>Completed: {{ $completedOrders }}</span>
            </div>
        </article>

        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8 shadow-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#e8dcc4]">Elite Patrons</p>
            <div class="mt-6 flex items-end gap-2">
                <p class="font-serif text-4xl font-bold text-white">{{ number_format($patronsCount) }}</p>
                <span class="pb-1 text-xs font-bold text-[#f3c94f]">+ VIP</span>
            </div>
            <div class="mt-7 flex -space-x-2">
                @foreach(range(1, 4) as $index)
                    <span class="flex h-8 w-8 items-center justify-center rounded-full border border-[#171b1c] bg-[#3a3f40] text-[10px] font-bold text-white">{{ $index }}</span>
                @endforeach
                <span class="flex h-8 w-8 items-center justify-center rounded-full border border-[#171b1c] bg-[#f3c94f] text-[10px] font-bold text-[#141818]">+{{ max($patronsCount - 4, 0) }}</span>
            </div>
        </article>
    </section>

    <section class="grid gap-7 xl:grid-cols-[1fr_300px]">
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-serif text-3xl font-bold text-white">Growth Projection</h2>
                <div class="flex gap-3 text-xs font-bold uppercase tracking-[0.18em]">
                    <span class="rounded bg-[#3a3f40] px-4 py-2 text-white">Weekly</span>
                    <span class="px-4 py-2 text-[#e8dcc4]">Monthly</span>
                </div>
            </div>

            <div class="mt-8 rounded border border-[#2a3031] bg-[#101415] p-5">
                <div class="flex h-64 items-end gap-3 sm:gap-5">
                    @foreach([38, 48, 42, 70, 62, 84, 76, 95, 88, 100] as $height)
                        <div class="flex flex-1 flex-col items-center gap-3">
                            <div class="w-full rounded-t bg-gradient-to-t from-[#f3c94f] to-[#fff0a0]" style="height: {{ $height }}%;"></div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 flex justify-between border-t border-[#2a3031] pt-4 text-[10px] uppercase tracking-[0.22em] text-[#9d947e]">
                    <span>Orders</span>
                    <span>Revenue</span>
                    <span>Patrons</span>
                    <span>Products</span>
                </div>
            </div>
        </article>

        <aside class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-6">
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Top Collection</p>
            <div class="mt-5 overflow-hidden rounded border border-[#2a3031] bg-[#101415]">
                @if($topProduct && $topProduct->image)
                    <img src="{{ asset('products/' . $topProduct->image) }}" alt="{{ $topProduct->name }}" class="h-40 w-full object-cover">
                @else
                    <div class="flex h-40 items-center justify-center bg-gradient-to-br from-[#2b302d] via-[#141818] to-[#5a4921]">
                        <span class="font-serif text-4xl text-[#f3c94f]">M</span>
                    </div>
                @endif
            </div>
            <div class="mt-5 flex items-end justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-white">{{ $topProduct->name ?? 'The Heritage Series' }}</h3>
                    <p class="text-sm text-[#e8dcc4]">{{ $productsCount }} Units Listed</p>
                </div>
                <a href="/admin/products" class="text-3xl leading-none text-[#f3c94f]">&rarr;</a>
            </div>
        </aside>
    </section>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="border-b border-[#5a5139] p-8">
            <h2 class="font-serif text-3xl font-bold text-white">Admin Control Center</h2>
            <p class="mt-3 text-sm text-[#e8dcc4]">Configure global store parameters and security protocols.</p>
        </div>

        <form action="/admin/settings" method="POST" class="grid gap-8 p-8 lg:grid-cols-2">
            @csrf
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Store Identity</p>
                <div class="mt-5 space-y-5">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Maison Name</span>
                        <input type="text" name="store_name" value="MyShop Atelier" class="mt-3 w-full border-0 border-b border-[#5a5139] bg-transparent px-0 py-3 text-sm text-white focus:border-[#f3c94f] focus:ring-0">
                    </label>
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Contact Signature</span>
                        <input type="email" name="store_email" value="concierge@myshop.com" class="mt-3 w-full border-0 border-b border-[#5a5139] bg-transparent px-0 py-3 text-sm text-white focus:border-[#f3c94f] focus:ring-0">
                    </label>
                    <input type="hidden" name="timezone" value="Asia/Kolkata">
                    <div class="flex items-center justify-between gap-5 pt-3">
                        <div>
                            <p class="text-sm font-semibold text-white">Private Gallery Mode</p>
                            <p class="text-xs text-[#e8dcc4]">Restricts access to invited patrons only</p>
                        </div>
                        <span class="flex h-7 w-14 items-center justify-end rounded-full bg-[#f3c94f] p-1">
                            <span class="h-5 w-5 rounded-full bg-[#141818]"></span>
                        </span>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Operations</p>
                <div class="mt-5 space-y-5">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Base Currency</span>
                        <select name="currency" class="mt-3 w-full border-0 border-b border-[#5a5139] bg-transparent px-0 py-3 text-sm text-white focus:border-[#f3c94f] focus:ring-0">
                            <option class="bg-[#171b1c]" value="INR">INR (&#8377;) - Indian Rupee</option>
                            <option class="bg-[#171b1c]" value="USD">USD ($) - US Dollar</option>
                        </select>
                    </label>
                    <div class="flex items-center justify-between gap-5 pt-3">
                        <div>
                            <p class="text-sm font-semibold text-white">Automatic Concierge</p>
                            <p class="text-xs text-[#e8dcc4]">AI-driven support for order inquiries</p>
                        </div>
                        <span class="flex h-7 w-14 items-center rounded-full bg-[#3a3f40] p-1">
                            <span class="h-5 w-5 rounded-full bg-[#c6b99d]"></span>
                        </span>
                    </div>
                    <div class="flex flex-col gap-3 pt-3 sm:flex-row">
                        <button type="submit" class="inline-flex flex-1 items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                            Save Configuration
                        </button>
                        <a href="/admin/settings" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f]">
                            Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="flex items-center justify-between border-b border-[#5a5139] p-8">
            <h2 class="font-serif text-3xl font-bold text-white">Recent Acquisitions</h2>
            <a href="/admin/orders" class="text-xs font-bold uppercase tracking-[0.22em] text-[#f3c94f]">View All</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left">
                <thead class="text-[11px] uppercase tracking-[0.22em] text-[#e8dcc4]">
                    <tr class="border-b border-[#2a3031]">
                        <th class="px-8 py-4 font-medium">Patron</th>
                        <th class="px-8 py-4 font-medium">Status</th>
                        <th class="px-8 py-4 font-medium">Value</th>
                        <th class="px-8 py-4 text-right font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                        <tr class="border-b border-[#2a3031] last:border-b-0">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#5a4921] text-xs font-bold text-[#f3c94f]">
                                        {{ strtoupper(substr($order->user->name ?? 'G', 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-bold text-white">{{ $order->user->name ?? 'Guest Patron' }}</p>
                                        <p class="text-xs text-[#9d947e]">ID: #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="rounded border px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] @if(strtolower($order->status) === 'completed') border-emerald-500/40 bg-emerald-500/10 text-emerald-300 @elseif(strtolower($order->status) === 'pending') border-[#f3c94f]/40 bg-[#f3c94f]/10 text-[#f3c94f] @else border-sky-500/40 bg-sky-500/10 text-sky-300 @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-8 py-5 font-bold text-white">&#8377;{{ number_format((float) $order->price * (int) ($order->quantity ?? 1), 2) }}</td>
                            <td class="px-8 py-5 text-right">
                                <a href="/admin/orders" class="text-xl text-[#e8dcc4] hover:text-[#f3c94f]">...</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-[#9d947e]">No acquisitions have been recorded yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <footer class="border-t border-[#5a5139] py-10">
        <div class="grid gap-8 md:grid-cols-4">
            <div>
                <p class="font-serif text-3xl font-bold text-[#f3c94f]">MYSHOP</p>
                <p class="mt-4 max-w-xs text-sm text-[#e8dcc4]">Curating excellence for the discerning few.</p>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-white">The Maison</p>
                <div class="mt-4 space-y-3 text-sm text-[#e8dcc4]">
                    <p>Heritage</p>
                    <p>Sustainability</p>
                    <p>Bespoke Services</p>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-white">Support</p>
                <div class="mt-4 space-y-3 text-sm text-[#e8dcc4]">
                    <p>Contact</p>
                    <p>Privacy</p>
                    <p>Terms</p>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-white">Member Access</p>
                <p class="mt-4 text-sm text-[#e8dcc4]">Subscribe to the atelier chronicle.</p>
                <div class="mt-4 flex border-b border-[#5a5139] pb-2">
                    <input type="email" placeholder="Email Address" class="min-w-0 flex-1 border-0 bg-transparent p-0 text-sm text-white placeholder:text-[#9d947e] focus:ring-0">
                    <button class="text-[#f3c94f]">&rarr;</button>
                </div>
            </div>
        </div>
        <p class="mt-12 text-center text-xs text-[#786f5a]">&copy; {{ now()->year }} MyShop. All Rights Reserved.</p>
    </footer>
</div>
@endsection
