<x-guest-layout>
    <x-auth-header
        title="Verify your email"
        subtitle="Thanks for signing up. Please confirm your email address to continue." />

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-xl bg-chocolate-50 px-4 py-3 text-sm font-medium text-chocolate-800 ring-1 ring-chocolate-100">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>{{ __('Resend Verification Email') }}</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-link">{{ __('Log Out') }}</button>
        </form>
    </div>
</x-guest-layout>
