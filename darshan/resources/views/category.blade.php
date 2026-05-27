<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }} | MyShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#111616] text-[#f6f0df] antialiased">

<nav class="sticky top-0 z-50 border-b border-[#3b3424] bg-[#1a2021]/95 px-4 py-4 backdrop-blur sm:px-8 lg:px-14">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-8">
            <a href="/" class="font-serif text-2xl font-bold tracking-wide text-[#f3c94f]">MYSHOP</a>

            <div class="flex w-full md:w-auto">
                <input type="text" placeholder="Search {{ $category }}..." id="liveSearch" class="w-full rounded-l border border-[#2a3031] bg-[#101415] px-4 py-3 text-sm text-white placeholder:text-[#786f5a] outline-none focus:border-[#f3c94f] md:w-[360px] xl:w-[500px]">
                <button type="button" id="searchButton" class="rounded-r border border-[#f3c94f] bg-[#f3c94f] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-[#141818]">
                    Search
                </button>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-x-5 gap-y-3 text-sm font-semibold">
            <a href="/" class="transition hover:text-[#f3c94f]">Home</a>
            @auth
                <a href="/dashboard" class="transition hover:text-[#f3c94f]">Dashboard</a>
                <a href="/shop" class="transition hover:text-[#f3c94f]">Shop</a>
                <a href="/cart" class="transition hover:text-[#f3c94f]">Cart</a>
                <a href="/orders" class="transition hover:text-[#f3c94f]">Orders</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-300 transition hover:text-red-200">Logout</button>
                </form>
            @else
                <a href="/login" class="transition hover:text-[#f3c94f]">Login</a>
                <a href="/register" class="transition hover:text-[#f3c94f]">Register</a>
            @endauth
        </div>
    </div>
</nav>

<main class="mx-auto max-w-7xl px-4 py-14 sm:px-8 lg:px-14">
    <header class="mb-9 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Category Collection</p>
            <h1 class="mt-3 font-serif text-5xl font-bold text-white sm:text-6xl">{{ $category }}</h1>
            <p class="mt-4 max-w-2xl text-sm leading-6 text-[#e8dcc4]">Showing only {{ $category }} products from the curated MyShop catalog.</p>
        </div>

        <a href="/shop" class="inline-flex items-center justify-center rounded border border-[#5a5139] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-white transition hover:border-[#f3c94f] hover:text-[#f3c94f]">
            View All Products
        </a>
    </header>

    <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @forelse($products as $product)
            <article class="product-card group overflow-hidden rounded-lg border border-[#2a3031] bg-[#171b1c] shadow-2xl transition duration-300 hover:-translate-y-1 hover:border-[#5a5139]"
                     data-name="{{ strtolower($product->name) }}"
                     data-description="{{ strtolower($product->description) }}">
                <div class="relative overflow-hidden bg-[#101415]">
                    @if($product->image)
                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                        <div class="flex h-64 items-center justify-center">
                            <span class="font-serif text-4xl text-[#f3c94f]">M</span>
                        </div>
                    @endif
                    <div class="absolute left-4 top-4 rounded border border-[#5a5139] bg-[#111616]/90 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#f3c94f]">
                        {{ $category }}
                    </div>
                </div>

                <div class="p-6">
                    <h2 class="font-serif text-2xl font-bold text-white">{{ $product->name }}</h2>
                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-[#cfc4aa]">{{ $product->description }}</p>

                    <div class="mt-6 flex flex-col gap-4 border-t border-[#2a3031] pt-5 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#9d947e]">Value</p>
                            <p class="mt-1 font-serif text-3xl font-bold text-[#f3c94f]">&#8377;{{ number_format($product->price, 2) }}</p>
                        </div>

                        <a href="{{ auth()->check() ? url('/add-to-cart/'.$product->id) : route('login') }}" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-[#141818] transition hover:bg-[#ffe37a]">
                            Add Cart
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-[#2a3031] bg-[#171b1c] p-10 text-center md:col-span-2 xl:col-span-3">
                <h2 class="font-serif text-3xl font-bold text-white">No products found</h2>
                <p class="mt-4 text-sm text-[#cfc4aa]">Please check another category or browse the full collection.</p>
                <a href="/" class="mt-7 inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Back to Home
                </a>
            </div>
        @endforelse
    </section>

    <p id="noProductsFound" class="mt-12 hidden text-center text-lg font-semibold text-[#9d947e]">No products found.</p>
</main>

<footer class="border-t border-[#5a5139] px-4 py-10 sm:px-8 lg:px-14">
    <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-4">
        <div>
            <p class="font-serif text-3xl font-bold text-[#f3c94f]">MYSHOP</p>
            <p class="mt-4 max-w-xs text-sm text-[#e8dcc4]">Curating excellence for the discerning few.</p>
        </div>
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-white">Links</p>
            <div class="mt-4 space-y-3 text-sm text-[#e8dcc4]">
                <p>Home</p>
                <p>Shop</p>
                <p>Orders</p>
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
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-white">Contact</p>
            <div class="mt-4 space-y-3 text-sm text-[#e8dcc4]">
                <p>support@myshop.com</p>
                <p>+91 9876543210</p>
            </div>
        </div>
    </div>
</footer>

<script>
    const liveSearch = document.getElementById('liveSearch');
    const searchButton = document.getElementById('searchButton');
    const productCards = document.querySelectorAll('.product-card');
    const noProductsFound = document.getElementById('noProductsFound');

    function filterProducts() {
        const query = liveSearch.value.toLowerCase().trim();
        let visibleCount = 0;

        productCards.forEach((card) => {
            const name = (card.dataset.name || '').toLowerCase();
            const description = (card.dataset.description || '').toLowerCase();
            const isVisible = name.includes(query) || description.includes(query);

            card.classList.toggle('hidden', !isVisible);
            if (isVisible) visibleCount++;
        });

        noProductsFound.classList.toggle('hidden', visibleCount > 0);
    }

    liveSearch.addEventListener('input', filterProducts);
    searchButton.addEventListener('click', filterProducts);
</script>

</body>
</html>
