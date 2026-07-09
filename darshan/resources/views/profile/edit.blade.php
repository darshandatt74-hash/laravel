@extends('layouts.user')

@section('content')

<div class="space-y-8">
    <header>
        <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Member Profile</p>
        <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Welcome, {{ $user->name }}</h1>
        <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Manage account details, security preferences, and membership information.</p>
    </header>

    <section class="grid gap-5 xl:grid-cols-[0.9fr_1.1fr]">
        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-7">
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Username</p>
                    <p class="mt-2 break-words font-bold text-white">{{ $user->name }}</p>
                </div>
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Email</p>
                    <p class="mt-2 break-words font-bold text-white">{{ $user->email }}</p>
                </div>
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Phone Number</p>
                    <p class="mt-2 font-bold text-white">{{ $user->phone ?? 'Not set' }}</p>
                </div>
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">City</p>
                    <p class="mt-2 font-bold text-white">{{ $user->city ?? 'Not set' }}</p>
                </div>
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Total Orders</p>
                    <p class="mt-2 font-serif text-4xl font-bold text-white">{{ $ordersCount }}</p>
                </div>
                <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Total Amount Spent</p>
                    <p class="mt-2 font-serif text-4xl font-bold text-[#f3c94f]">&#8377;{{ number_format($totalSpent, 2) }}</p>
                </div>
            </div>
        </article>

        <article class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
            <div class="flex flex-col gap-3 border-b border-[#5a5139] p-7 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="font-serif text-3xl font-bold text-white">Recent Orders</h2>
                    <p class="mt-2 text-sm text-[#cfc4aa]">Your latest purchases and current statuses.</p>
                </div>
                <a href="/orders" class="text-xs font-bold uppercase tracking-[0.22em] text-[#f3c94f]">View All</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[620px] text-left">
                    <thead class="text-[11px] uppercase tracking-[0.22em] text-[#e8dcc4]">
                        <tr class="border-b border-[#2a3031]">
                            <th class="px-7 py-4 font-medium">Order</th>
                            <th class="px-7 py-4 font-medium">Product</th>
                            <th class="px-7 py-4 font-medium">Amount</th>
                            <th class="px-7 py-4 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                            <tr class="border-b border-[#2a3031] last:border-b-0">
                                <td class="px-7 py-5 font-bold text-white">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-7 py-5 text-[#e8dcc4]">{{ $order->product->name ?? 'Deleted Product' }}</td>
                                <td class="px-7 py-5 font-bold text-[#f3c94f]">&#8377;{{ number_format($order->price, 2) }}</td>
                                <td class="px-7 py-5">
                                    <span class="rounded border px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] @if($order->status === 'Completed') border-emerald-500/40 bg-emerald-500/10 text-emerald-300 @elseif($order->status === 'Pending') border-[#f3c94f]/40 bg-[#f3c94f]/10 text-[#f3c94f] @else border-red-500/40 bg-red-500/10 text-red-300 @endif">
                                        {{ $order->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-7 py-10 text-center text-[#9d947e]">No recent orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>
    </section>

    <section class="grid gap-7 xl:grid-cols-[1fr_380px]">
        <div class="space-y-7">
            <article class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-7">
                @include('profile.partials.update-password-form')
            </article>

            <article class="rounded-lg border border-red-500/30 bg-[#171b1c] p-7">
                @include('profile.partials.delete-user-form')
            </article>
        </div>

        <aside class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-7">
            @include('profile.partials.update-profile-information-form')
        </aside>
    </section>
</div>

@endsection
