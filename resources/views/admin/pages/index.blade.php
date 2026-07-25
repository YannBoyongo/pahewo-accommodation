<x-admin-layout title="Website Pages" heading="Website Pages" description="Edit visitor-facing page content">
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($pages as $page)
            @php
                $definition = config('content-pages.'.$page->slug);
            @endphp
            <article class="card-luxe flex flex-col p-6 hover:translate-y-0">
                <p class="section-label">Page</p>
                <h2 class="mt-3 font-serif text-2xl font-semibold text-chocolate-800">{{ $page->name }}</h2>
                <p class="mt-3 text-sm leading-6 text-neutral-500">
                    {{ count($definition['fields']) }} editable text and image fields.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('dashboard.pages.edit', $page->slug) }}" class="btn-primary px-5 py-2.5 text-xs uppercase tracking-[0.12em]">Edit page</a>
                    <a href="{{ route($definition['route']) }}" target="_blank" class="btn-secondary px-5 py-2.5 text-xs uppercase tracking-[0.12em]">View</a>
                </div>
            </article>
        @endforeach
    </div>
</x-admin-layout>
