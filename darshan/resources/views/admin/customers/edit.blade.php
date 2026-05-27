@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Patron Profile</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Edit Patron</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Update member identity and contact details.</p>
        </div>

        <a href="/admin/customers" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            Back
        </a>
    </header>

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="border-b border-[#5a5139] p-7">
            <h2 class="font-serif text-3xl font-bold text-white">{{ $customer->name }}</h2>
            <p class="mt-2 text-sm text-[#cfc4aa]">Member ID #{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</p>
        </div>

        <form action="/admin/customers/{{ $customer->id }}" method="POST" class="space-y-7 p-7">
            @csrf
            @method('PUT')

            <div class="grid gap-7 lg:grid-cols-2">
                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Name</span>
                    <input type="text" name="name" value="{{ $customer->name }}" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Email</span>
                    <input type="email" name="email" value="{{ $customer->email }}" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>
            </div>

            <div class="grid gap-7 lg:grid-cols-2">
                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Phone</span>
                    <input type="tel" name="phone" value="{{ $customer->phone }}" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">City</span>
                    <input type="text" name="city" value="{{ $customer->city }}" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>
            </div>

            <div class="flex flex-col gap-3 border-t border-[#2a3031] pt-7 sm:flex-row sm:items-center sm:justify-between">
                <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Update Patron
                </button>
                <a href="/admin/customers" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
                    Cancel
                </a>
            </div>
        </form>
    </section>
</div>

@endsection
