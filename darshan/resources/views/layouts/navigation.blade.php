<nav class="bg-black text-white shadow-lg">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">

                <a href="/" class="text-3xl font-bold">
                    MyShop
                </a>

            </div>

            <!-- Links -->
            <div class="flex items-center space-x-6 text-lg">

                <a href="/" class="hover:text-yellow-400 transition">
                    Home
                </a>

                <a href="/dashboard" class="hover:text-yellow-400 transition">
                    Dashboard
                </a>

                <span class="text-gray-300">
                    {{ Auth::user()->name }}
                </span>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>