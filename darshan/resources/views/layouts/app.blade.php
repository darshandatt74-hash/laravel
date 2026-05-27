<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyShop</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <div class="w-72 bg-black text-white p-10">

        <h1 class="text-5xl font-bold mb-12">
            MyShop
        </h1>

        <ul class="space-y-8 text-2xl">

            <!-- Dashboard -->
            <li>
                <a href="/dashboard"
                   class="block px-6 py-4 rounded-2xl font-bold
                   {{ request()->is('dashboard') ? 'bg-yellow-400 text-black' : 'hover:bg-gray-800 text-white' }}">
                    Dashboard
                </a>
            </li>

            <!-- Shop -->
            <li>
                <a href="/shop"
                   class="block px-6 py-4 rounded-2xl font-bold
                   {{ request()->is('shop') ? 'bg-yellow-400 text-black' : 'hover:bg-gray-800 text-white' }}">
                    Shop
                </a>
            </li>

            <!-- Cart -->
            <li>
                <a href="/cart"
                   class="block px-6 py-4 rounded-2xl font-bold
                   {{ request()->is('cart') ? 'bg-yellow-400 text-black' : 'hover:bg-gray-800 text-white' }}">
                    Cart
                </a>
            </li>

            <!-- Orders -->
            <li>
                <a href="/orders"
                   class="block px-6 py-4 rounded-2xl font-bold
                   {{ request()->is('orders') ? 'bg-yellow-400 text-black' : 'hover:bg-gray-800 text-white' }}">
                    Orders
                </a>
            </li>

            <!-- Profile -->
            <li>
                <a href="/profile"
                   class="block px-6 py-4 rounded-2xl font-bold
                   {{ request()->is('profile') ? 'bg-yellow-400 text-black' : 'hover:bg-gray-800 text-white' }}">
                    Profile
                </a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">

        @yield('content')

    </div>

</div>

</body>
</html>