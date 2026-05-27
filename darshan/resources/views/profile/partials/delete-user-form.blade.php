<section class="space-y-5">
    <header>
        <h2 class="font-serif text-3xl font-bold text-white">Danger Zone</h2>
        <p class="mt-2 text-sm text-[#cfc4aa]">
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="!rounded !border !border-red-500/40 !bg-transparent !px-6 !py-3 !text-xs !font-bold !uppercase !tracking-[0.22em] !text-red-300 hover:!bg-red-500/10"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="bg-[#171b1c] p-6 text-[#f6f0df]">
            @csrf
            @method('delete')

            <h2 class="font-serif text-2xl font-bold text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-3 text-sm text-[#cfc4aa]">
                {{ __('Please enter your password to confirm permanent account deletion.') }}
            </p>

            <div class="mt-6">
                <input id="password" name="password" type="password" class="mt-3 w-full rounded border border-[#2a3031] bg-[#101415] px-4 py-4 text-sm text-white focus:border-[#f3c94f] focus:ring-[#f3c94f]/20" placeholder="{{ __('Password') }}">

                @if($errors->userDeletion->get('password'))
                    <p class="mt-2 text-sm text-red-300">{{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="rounded border border-[#5a5139] px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-white transition hover:border-[#f3c94f]">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="rounded border border-red-500/40 px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-red-300 transition hover:bg-red-500/10">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
