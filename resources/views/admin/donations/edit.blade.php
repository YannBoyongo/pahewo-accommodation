<x-admin-layout title="Edit Donation" heading="Edit Donation" description="Operations">
    <form method="POST" action="{{ route('dashboard.donations.update', $donation) }}" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <x-input-label for="donor_name" value="Donor name" />
                <x-text-input id="donor_name" name="donor_name" class="input-luxe mt-1" :value="old('donor_name', $donation->donor_name)" required />
                <x-input-error :messages="$errors->get('donor_name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="donor_email" value="Donor email" />
                <x-text-input id="donor_email" name="donor_email" type="email" class="input-luxe mt-1" :value="old('donor_email', $donation->donor_email)" required />
                <x-input-error :messages="$errors->get('donor_email')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-3">
            <div>
                <x-input-label for="amount" value="Amount (UGX)" />
                <x-text-input id="amount" name="amount" type="number" step="1" class="input-luxe mt-1" :value="old('amount', $donation->amount)" required />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="currency" value="Currency" />
                <x-text-input id="currency" name="currency" class="input-luxe mt-1" value="UGX" maxlength="3" readonly required />
                <x-input-error :messages="$errors->get('currency')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="status" value="Status" />
                <select id="status" name="status" class="input-luxe mt-1" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" @selected(old('status', $donation->status) === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="designation" value="Designation" />
            <select id="designation" name="designation" class="input-luxe mt-1 max-w-md" required>
                @foreach ($designations as $value => $label)
                    <option value="{{ $value }}" @selected(old('designation', $donation->designation) === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('designation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="message" value="Message" />
            <textarea id="message" name="message" rows="4" class="input-luxe mt-1">{{ old('message', $donation->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update donation</x-primary-button>
            <a href="{{ route('dashboard.donations.show', $donation) }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.donations.destroy', $donation) }}" class="mt-6" onsubmit="return confirm('Delete this donation?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete donation</button>
    </form>
</x-admin-layout>
