<x-admin-layout :title="'Edit '.$definition['name']" :heading="$definition['name']" description="Visitor-facing page content">
    <div class="max-w-5xl space-y-8">

        <div class="rounded-2xl border border-chocolate-200 bg-chocolate-50 px-5 py-4 text-sm leading-relaxed text-chocolate-800">
            Each section is saved independently. Edit a section and click its own <strong>Save</strong> button — other sections are unaffected.
        </div>

        @foreach (collect($definition['fields'])->groupBy('section', true) as $section => $fields)
            <form
                id="{{ \Illuminate\Support\Str::slug($section) }}"
                method="POST"
                action="{{ route('dashboard.pages.update', $page->slug) }}"
                enctype="multipart/form-data"
                class="card-luxe scroll-mt-28 p-7 hover:translate-y-0 sm:p-8"
            >
                @csrf
                @method('PUT')
                <input type="hidden" name="section" value="{{ $section }}">

                @include('admin.pages.partials.section-fields', compact('page', 'section', 'fields'))

                <div class="mt-7 flex items-center justify-between border-t border-chocolate-100 pt-5">
                    <span class="text-xs text-neutral-400">Section: {{ $section }}</span>
                    <x-primary-button>Save {{ $section }}</x-primary-button>
                </div>
            </form>
        @endforeach

        <div class="flex flex-wrap gap-4 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-chocolate-100">
            <a href="{{ route($definition['route']) }}" target="_blank" class="btn-secondary">Preview page</a>
            <a href="{{ route('dashboard.pages.index') }}" class="inline-flex items-center px-4 text-sm font-medium text-neutral-500 hover:text-chocolate-800">Back to pages</a>
        </div>

    </div>
</x-admin-layout>
