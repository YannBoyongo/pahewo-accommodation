<x-guest-layout>
    <x-auth-header
        title="Confirm your password"
        subtitle="This is a secure area. Please confirm your password before continuing." />

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-password-input id="password" class="mt-2 block w-full" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <x-primary-button class="w-full justify-center">{{ __('Confirm') }}</x-primary-button>
    </form>
</x-guest-layout>
