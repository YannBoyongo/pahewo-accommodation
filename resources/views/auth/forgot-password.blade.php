<x-guest-layout>
    <x-auth-header
        title="Reset your password"
        subtitle="Enter your email and we will send you a secure reset link." />

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <x-primary-button class="w-full justify-center">{{ __('Email Password Reset Link') }}</x-primary-button>

        <p class="text-center text-sm text-neutral-500">
            <a href="{{ route('login') }}" class="auth-link font-medium">{{ __('Back to sign in') }}</a>
        </p>
    </form>
</x-guest-layout>
