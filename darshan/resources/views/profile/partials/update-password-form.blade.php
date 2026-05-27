<section>
    <header>
        <h2 class="font-serif text-3xl font-bold text-white">Security</h2>
        <p class="mt-2 text-sm text-[#cfc4aa]">Use a strong password to keep your member account protected.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-7 space-y-5">
        @csrf
        @method('put')

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Current Password</span>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->updatePassword->get('current_password'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </label>

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">New Password</span>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->updatePassword->get('password'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </label>

        <label class="block">
            <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8dcc4]">Confirm Password</span>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20">
            @if($errors->updatePassword->get('password_confirmation'))
                <p class="mt-2 text-sm text-red-300">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </label>

        <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded border border-[#f3c94f] bg-[#f3c94f] px-7 py-4 text-xs font-bold uppercase tracking-[0.22em] text-[#141818] transition hover:bg-[#ffe37a]">
                Save Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-300">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
