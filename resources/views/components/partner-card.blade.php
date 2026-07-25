@props(['partner'])

<article @class(['card-luxe reveal overflow-hidden hover:translate-y-0', 'ring-2 ring-gold-500' => $partner->is_featured])>
    @if ($partner->logoUrl())
        <div class="flex h-32 items-center justify-center border-b border-chocolate-50 bg-beige px-8 py-6">
            <img src="{{ $partner->logoUrl() }}" alt="{{ $partner->name }} logo" class="max-h-20 max-w-full object-contain">
        </div>
    @endif

    <div class="p-8">
        @if ($partner->is_featured)
            <span class="rounded-full bg-gold-500 px-3 py-1 text-xs font-semibold text-chocolate-900">Primary Partner</span>
        @endif

        <h3 @class(['text-lg font-semibold text-chocolate-800', 'mt-4' => $partner->is_featured, 'mt-0' => ! $partner->is_featured])>
            {{ $partner->name }}
        </h3>

        @if ($partner->description)
            <p class="mt-3 text-sm leading-relaxed text-neutral-500">{{ $partner->description }}</p>
        @endif

        @if ($partner->website_url)
            <a href="{{ $partner->website_url }}" target="_blank" rel="noopener"
                class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-chocolate-700 transition hover:text-gold-600">
                Visit website
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
            </a>
        @endif
    </div>
</article>
