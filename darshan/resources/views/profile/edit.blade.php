@extends('layouts.user')

@section('content')

<div class="space-y-8">
    <header>
        <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Member Identity</p>
        <h1 class="mt-3 font-serif text-4xl font-bold text-white sm:text-5xl">My Profile</h1>
        <p class="mt-3 max-w-2xl text-sm text-[#e8dcc4]">Manage account details, security preferences, and membership information.</p>
    </header>

    <section class="grid gap-7 xl:grid-cols-[1fr_380px]">
        <div class="space-y-7">
            <article class="rounded-lg border border-[#2a3031] bg-[#171b1c]">
                <div class="border-b border-[#5a5139] p-7">
                    <h2 class="font-serif text-3xl font-bold text-white">Account Summary</h2>
                    <p class="mt-2 text-sm text-[#cfc4aa]">Your current profile information.</p>
                </div>
                <div class="grid gap-4 p-7 md:grid-cols-2">
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Name</p>
                        <p class="mt-2 font-bold text-white">{{ $user->name }}</p>
                    </div>
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Email</p>
                        <p class="mt-2 font-bold text-white">{{ $user->email }}</p>
                    </div>
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Phone</p>
                        <p class="mt-2 font-bold text-white">{{ $user->phone ?? 'Not set' }}</p>
                    </div>
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">City</p>
                        <p class="mt-2 font-bold text-white">{{ $user->city ?? 'Not set' }}</p>
                    </div>
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Joined</p>
                        <p class="mt-2 font-bold text-white">{{ $user->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="rounded border border-[#2a3031] bg-[#101415] p-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#9d947e]">Email Status</p>
                        <p class="mt-2 font-bold text-white">{{ $user->hasVerifiedEmail() ? 'Verified' : 'Unverified' }}</p>
                    </div>
                </div>
            </article>

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
