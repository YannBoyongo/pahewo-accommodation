<x-guest-layout>
    <x-auth-header title="Welcome back" subtitle="Sign in to manage your account and bookings." />

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-password-input id="password" class="mt-2 block w-full" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-700/30" name="remember">
                <span class="text-sm text-neutral-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center">{{ __('Log in') }}</x-primary-button>
    </form>
</x-guest-layout>
