<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#111616] text-[#f6f0df] antialiased">

<div class="min-h-screen lg:flex">

    <aside class="border-b border-[#3b3424] bg-[#1a2021] lg:fixed lg:inset-y-0 lg:left-0 lg:z-20 lg:w-72 lg:border-b-0 lg:border-r">
        <div class="flex min-h-full flex-col justify-between px-5 py-6 sm:px-7 lg:px-6">
            <div>
                <a href="/" class="block font-serif text-2xl font-bold tracking-wide text-[#f3c94f]">
                    MYSHOP
                </a>

                <div class="mt-8 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#6b603e] bg-[#222829] text-[#f3c94f]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V8a4 4 0 0 0-8 0v3m-2 0h12l-1 9H7l-1-9Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Member' }}</p>
                        <p class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#f3c94f]">Member Access</p>
                    </div>
                </div>

                <nav class="mt-9 space-y-2">
                    <a href="/" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('/')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Home
                    </a>
                    <a href="/dashboard" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('dashboard')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Dashboard
                    </a>
                    <a href="/shop" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('shop')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Shop
                    </a>
                    <a href="/cart" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('cart')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Cart
                    </a>
                    <a href="/orders" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('orders')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Orders
                    </a>
                    <a href="/profile" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('profile')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <span class="h-2 w-2 rounded-full bg-current"></span>
                        Profile
                    </a>
                </nav>
            </div>

            <div class="mt-8 space-y-3">
                <a href="/shop" class="inline-flex w-full items-center justify-center rounded border border-[#6b603e] px-4 py-3 text-[11px] font-bold uppercase tracking-[0.25em] text-[#f3c94f] transition hover:border-[#f3c94f] hover:bg-[#252b2c]">
                    Browse Collection
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex w-full items-center justify-center rounded border border-red-500/40 px-4 py-3 text-[11px] font-bold uppercase tracking-[0.25em] text-red-300 transition hover:bg-red-500/10 hover:text-red-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="lg:ml-72 lg:flex-1">
        <main class="px-4 py-8 sm:px-8 lg:px-14 lg:py-12">
            <div class="mx-auto max-w-6xl">
                @yield('content')
            </div>
        </main>
    </div>

</div>

</body>
</html>
