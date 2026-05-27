@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Elite Patronage</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Patrons</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Manage customer records with the same refined admin presentation.</p>
        </div>

        <div class="rounded border border-[#2a3031] bg-[#171b1c] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white">
            Members: {{ $customers->count() }}
        </div>
    </header>

    @if(session('success'))
        <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-5 text-sm font-semibold text-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[820px] text-left">
                <thead class="text-[11px] uppercase tracking-[0.22em] text-[#e8dcc4]">
                    <tr class="border-b border-[#5a5139]">
                        <th class="px-7 py-5 font-medium">ID</th>
                        <th class="px-7 py-5 font-medium">Patron</th>
                        <th class="px-7 py-5 font-medium">Email</th>
                        <th class="px-7 py-5 font-medium">Joined</th>
                        <th class="px-7 py-5 text-right font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr class="border-b border-[#2a3031] last:border-b-0 transition hover:bg-[#1c2223]">
                            <td class="px-7 py-5 font-bold text-white">#{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-7 py-5">
                                <div class="flex items-center gap-4">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#5a4921] text-xs font-bold text-[#f3c94f]">
                                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-bold text-white">{{ $customer->name }}</p>
                                        <p class="text-xs text-[#9d947e]">{{ $customer->city ?? 'Location pending' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-7 py-5 text-[#e8dcc4]">{{ $customer->email }}</td>
                            <td class="px-7 py-5 text-[#cfc4aa]">{{ $customer->created_at->format('d M Y') }}</td>
                            <td class="px-7 py-5">
                                <div class="flex justify-end gap-2">
                                    <a href="/admin/customers/{{ $customer->id }}/edit" class="rounded border border-[#5a5139] px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
                                        Edit
                                    </a>
                                    <form action="/admin/customers/{{ $customer->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded border border-red-500/40 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-red-300 transition hover:bg-red-500/10">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-7 py-10 text-center text-[#9d947e]">No patrons found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection
