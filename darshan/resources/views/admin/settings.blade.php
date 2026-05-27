@extends('layouts.admin')

@section('content')

<div class="space-y-8">
    <header class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Store Protocols</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">Settings</h1>
            <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Configure brand identity, operational defaults and store presentation.</p>
        </div>

        <a href="/admin/dashboard" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            Dashboard
        </a>
    </header>

    @if(session('success'))
        <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-5 text-sm font-semibold text-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <section class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
        <div class="border-b border-[#5a5139] p-7">
            <h2 class="font-serif text-3xl font-bold text-white">Admin Control Center</h2>
            <p class="mt-2 text-sm text-[#cfc4aa]">Fine tune global store parameters and administrative preferences.</p>
        </div>

        <form action="/admin/settings" method="POST" class="grid gap-8 p-7 lg:grid-cols-2">
            @csrf

            <div>
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Store Identity</p>
                <div class="mt-5 space-y-6">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Store Name</span>
                        <input type="text" name="store_name" value="MyShop Store" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>

                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Store Email</span>
                        <input type="email" name="store_email" value="support@myshop.com" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>

                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-sm font-bold text-white">Private Gallery Mode</p>
                        <p class="mt-2 text-sm text-[#cfc4aa]">Restricts access to invited patrons only.</p>
                        <div class="mt-4 flex h-7 w-14 items-center justify-end rounded-full bg-[#f3c94f] p-1">
                            <span class="h-5 w-5 rounded-full bg-[#141818]"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#f3c94f]">Operations</p>
                <div class="mt-5 space-y-6">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Currency</span>
                        <select name="currency" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                            <option class="bg-[#171b1c]" value="INR">INR - Indian Rupee</option>
                            <option class="bg-[#171b1c]" value="USD">USD - US Dollar</option>
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Timezone</span>
                        <select name="timezone" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                            <option class="bg-[#171b1c]">Asia/Kolkata</option>
                            <option class="bg-[#171b1c]">UTC</option>
                            <option class="bg-[#171b1c]">America/New_York</option>
                            <option class="bg-[#171b1c]">Europe/London</option>
                        </select>
                    </label>

                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-sm font-bold text-white">Automatic Concierge</p>
                        <p class="mt-2 text-sm text-[#cfc4aa]">AI-driven support for order inquiries.</p>
                        <div class="mt-4 flex h-7 w-14 items-center rounded-full bg-[#3a3f40] p-1">
                            <span class="h-5 w-5 rounded-full bg-[#c6b99d]"></span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                        <button type="submit" class="inline-flex flex-1 items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                            Save Settings
                        </button>
                        <a href="/admin/settings" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
                            Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

@endsection
