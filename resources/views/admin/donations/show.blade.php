<x-admin-layout title="Donation {{ $donation->reference }}" heading="Donation {{ $donation->reference }}" description="Operations">
    <div class="mb-6 flex gap-4">
        <a href="{{ route('dashboard.donations.edit', $donation) }}" class="btn-primary">Edit donation</a>
        <a href="{{ route('dashboard.donations.index') }}" class="btn-secondary">Back to list</a>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Donor details</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-neutral-500">Name</dt><dd class="font-medium text-chocolate-800">{{ $donation->donor_name }}</dd></div>
                <div><dt class="text-neutral-500">Email</dt><dd>{{ $donation->donor_email }}</dd></div>
            </dl>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Donation details</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-neutral-500">Amount</dt><dd class="font-serif text-2xl text-chocolate-800">{{ \App\Support\Currency::format($donation->amount) }}</dd></div>
                <div><dt class="text-neutral-500">Designation</dt><dd class="capitalize">{{ str_replace('-', ' ', $donation->designation) }}</dd></div>
                <div><dt class="text-neutral-500">Status</dt><dd class="capitalize">{{ $donation->status }}</dd></div>
            </dl>
        </div>

        <div class="card-luxe p-6 lg:col-span-2 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Message</h2>
            <p class="mt-4 text-sm text-neutral-600">{{ $donation->message ?: 'No message provided.' }}</p>
        </div>
    </div>
</x-admin-layout>
