<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <header>
        <h2 class="font-serif text-3xl font-bold text-white">Update Profile</h2>
        <p class="mt-2 text-sm text-[#cfc4aa]">Keep your contact details accurate for orders and support.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-7 space-y-5">
        @csrf
        @method('patch')

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Name</span>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->get('name'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->first('name') }}</p>
            @endif
        </label>

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Email</span>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->get('email'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->first('email') }}</p>
            @endif
        </label>

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Phone</span>
            <input id="phone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}" autocomplete="tel" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->get('phone'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->first('phone') }}</p>
            @endif
        </label>

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">City</span>
            <input id="city" name="city" type="text" value="{{ old('city', $user->city) }}" autocomplete="address-level2" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->get('city'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->first('city') }}</p>
            @endif
        </label>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <p class="rounded border border-[#f3c94f]/30 bg-[#f3c94f]/10 p-4 text-sm text-[#f3c94f]">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification" class="font-bold underline">{{ __('Re-send verification email.') }}</button>
            </p>
        @endif

        <div class="flex flex-col gap-3 pt-2">
            <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                Save Profile
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-300">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
