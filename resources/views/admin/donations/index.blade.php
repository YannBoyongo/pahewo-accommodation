<x-admin-layout title="Donations" heading="Donations" description="Operations">
    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Reference</th>
                        <th class="px-6 py-4">Donor</th>
                        <th class="px-6 py-4">Amount</th>
                        <th class="px-6 py-4">Designation</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($donations as $donation)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4 font-medium text-chocolate-800">{{ $donation->reference }}</td>
                            <td class="px-6 py-4">
                                <p>{{ $donation->donor_name }}</p>
                                <p class="text-xs text-neutral-500">{{ $donation->donor_email }}</p>
                            </td>
                            <td class="px-6 py-4">{{ \App\Support\Currency::format($donation->amount) }}</td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('-', ' ', $donation->designation) }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full px-2 py-1 text-xs font-medium capitalize
                                    @if($donation->status === 'received') bg-emerald-100 text-emerald-700
                                    @elseif($donation->status === 'cancelled') bg-red-100 text-red-700
                                    @else bg-amber-100 text-amber-700 @endif">
                                    {{ $donation->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.donations.show', $donation) }}" class="text-chocolate-600 hover:text-chocolate-800">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-neutral-500">No donations yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($donations->hasPages())
            <div class="border-t border-chocolate-100 px-6 py-4">
                {{ $donations->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
