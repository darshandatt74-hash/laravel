<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#111616] text-[#f6f0df] antialiased">

<div class="min-h-screen lg:flex">

    <aside class="border-b border-[#3b3424] bg-[#1a2021] lg:fixed lg:inset-y-0 lg:left-0 lg:z-20 lg:w-72 lg:border-b-0 lg:border-r">
        <div class="flex min-h-full flex-col justify-between px-5 py-6 sm:px-7 lg:px-6">
            <div>
                <a href="/admin/dashboard" class="block font-serif text-2xl font-bold tracking-wide text-[#f3c94f]">
                    MYSHOP
                </a>

                <div class="mt-8 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#6b603e] bg-[#222829] text-[#f3c94f]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V8a4 4 0 0 0-8 0v3m-2 0h12l-1 9H7l-1-9Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Admin</p>
                        <p class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#f3c94f]">Elite Access</p>
                    </div>
                </div>

                <nav class="mt-9 space-y-2">
                    <a href="/admin/dashboard" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('admin/dashboard')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h7v7H4V4Zm9 0h7v7h-7V4ZM4 13h7v7H4v-7Zm9 0h7v7h-7v-7Z" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="/admin/products" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('admin/products*')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7 12 3 4 7m16 0-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Products
                    </a>

                    <a href="/admin/orders" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('admin/orders*')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h13M8 12h13M8 17h13M3 7h.01M3 12h.01M3 17h.01" />
                        </svg>
                        Orders
                    </a>

                    <a href="/admin/customers" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('admin/customers*')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20a5 5 0 0 0-10 0m10-8a4 4 0 1 1-8 0 4 4 0 0 1 8 0Zm4 8a4 4 0 0 0-3-3.87" />
                        </svg>
                        Patrons
                    </a>

                    <a href="/admin/settings" class="flex items-center gap-3 rounded px-4 py-3 text-sm font-medium transition @if(request()->is('admin/settings')) bg-[#d8b63c] text-[#141818] @else text-[#f6f0df] hover:bg-[#252b2c] hover:text-[#f3c94f] @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.3 4.3 11 2h2l.7 2.3 2.1.9L18 4l2 2-1.2 2.2.9 2.1L22 11v2l-2.3.7-.9 2.1L20 18l-2 2-2.2-1.2-2.1.9L13 22h-2l-.7-2.3-2.1-.9L6 20l-2-2 1.2-2.2-.9-2.1L2 13v-2l2.3-.7.9-2.1L4 6l2-2 2.2 1.2 2.1-.9Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>

            <a href="/admin/products/create" class="mt-8 inline-flex w-full items-center justify-center rounded border border-[#6b603e] px-4 py-3 text-[11px] font-bold uppercase tracking-[0.25em] text-[#f3c94f] transition hover:border-[#f3c94f] hover:bg-[#252b2c]">
                Add New Product
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit" class="inline-flex w-full items-center justify-center rounded border border-red-500/40 px-4 py-3 text-[11px] font-bold uppercase tracking-[0.25em] text-red-300 transition hover:bg-red-500/10 hover:text-red-200">
                    Admin Logout
                </button>
            </form>
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
