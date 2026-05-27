<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyShop</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#111616] text-[#f6f0df] antialiased">

<main class="grid min-h-screen lg:grid-cols-[1fr_520px]">
    <section class="hidden border-r border-[#3b3424] bg-[#1a2021] px-14 py-12 lg:flex lg:flex-col lg:justify-between">
        <a href="/" class="font-serif text-3xl font-bold tracking-wide text-[#f3c94f]">MYSHOP</a>

        <div class="max-w-2xl">
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Member Access</p>
            <h1 class="mt-4 font-serif text-6xl font-bold leading-tight text-white">Welcome back to the maison.</h1>
            <p class="mt-6 max-w-xl text-base leading-7 text-[#e8dcc4]">Sign in to continue shopping, manage your cart, and track your private order history.</p>
        </div>

        <p class="text-xs text-[#786f5a]">&copy; {{ now()->year }} MyShop. All Rights Reserved.</p>
    </section>

    <section class="flex min-h-screen items-center justify-center px-4 py-10 sm:px-8">
        <div class="w-full max-w-md rounded-lg border border-[#2a3031] bg-[#171b1c] p-7 shadow-2xl">
            <div class="mb-8">
                <a href="/" class="font-serif text-2xl font-bold tracking-wide text-[#f3c94f] lg:hidden">MYSHOP</a>
                <p class="mt-6 text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Secure Login</p>
                <h2 class="mt-3 font-serif text-4xl font-bold text-white">Login</h2>
                <p class="mt-3 text-sm text-[#cfc4aa]">Enter your account details to continue.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded border border-red-500/40 bg-red-500/10 p-4 text-sm text-red-300">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Password</span>
                    <input type="password" name="password" required autocomplete="current-password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <div class="flex items-center justify-between gap-4">
                    <label class="flex items-center gap-3 text-sm text-[#cfc4aa]">
                        <input type="checkbox" name="remember" class="rounded border-[#5a5139] bg-[#101415] text-[#f3c94f] focus:ring-[#f3c94f]/20">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#f3c94f] hover:underline">Forgot?</a>
                    @endif
                </div>

                <button type="submit" class="inline-flex w-full items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Login
                </button>

                <p class="text-center text-sm text-[#cfc4aa]">
                    Don't have an account?
                    <a href="/register" class="font-bold text-[#f3c94f] hover:underline">Register</a>
                </p>
            </form>
        </div>
    </section>
</main>

</body>
</html>
