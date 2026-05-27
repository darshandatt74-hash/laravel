<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | MyShop</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#111616] text-[#f6f0df] antialiased">

<main class="grid min-h-screen lg:grid-cols-[1fr_560px]">
    <section class="hidden border-r border-[#3b3424] bg-[#1a2021] px-14 py-12 lg:flex lg:flex-col lg:justify-between">
        <a href="/" class="font-serif text-3xl font-bold tracking-wide text-[#f3c94f]">MYSHOP</a>

        <div class="max-w-2xl">
            <p class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Create Member Access</p>
            <h1 class="mt-4 font-serif text-6xl font-bold leading-tight text-white">Join the private collection.</h1>
            <p class="mt-6 max-w-xl text-base leading-7 text-[#e8dcc4]">Create your MyShop account to browse curated products, save details, and place orders faster.</p>
        </div>

        <p class="text-xs text-[#786f5a]">&copy; {{ now()->year }} MyShop. All Rights Reserved.</p>
    </section>

    <section class="flex min-h-screen items-center justify-center px-4 py-10 sm:px-8">
        <div class="w-full max-w-md rounded-lg border border-[#2a3031] bg-[#171b1c] p-7 shadow-2xl">
            <div class="mb-8">
                <a href="/" class="font-serif text-2xl font-bold tracking-wide text-[#f3c94f] lg:hidden">MYSHOP</a>
                <p class="mt-6 text-[11px] font-bold uppercase tracking-[0.35em] text-[#f3c94f]">Member Registry</p>
                <h2 class="mt-3 font-serif text-4xl font-bold text-white">Register</h2>
                <p class="mt-3 text-sm text-[#cfc4aa]">Create your account with contact details.</p>
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

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Full Name</span>
                    <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Phone</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="10 digit number" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" required class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>

                    <label class="block">
                        <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">City</span>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="City" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                    </label>
                </div>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Password</span>
                    <input type="password" name="password" required autocomplete="new-password" placeholder="Enter password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <label class="block">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Confirm Password</span>
                    <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white placeholder:text-[#786f5a] focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
                </label>

                <button type="submit" class="inline-flex w-full items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                    Register
                </button>

                <p class="text-center text-sm text-[#cfc4aa]">
                    Already have an account?
                    <a href="/login" class="font-bold text-[#f3c94f] hover:underline">Login</a>
                </p>
            </form>
        </div>
    </section>
</main>

</body>
</html>
