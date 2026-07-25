<x-app-layout>
    <x-slot name="header">
        <p class="section-label">Account</p>
        <h2 class="mt-2 font-serif text-3xl text-chocolate-800 sm:text-4xl">{{ __('Profile') }}</h2>
    </x-slot>

    <div class="mx-auto max-w-7xl space-y-8 px-6 lg:px-8">
        <div class="card-luxe p-6 hover:translate-y-0 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
