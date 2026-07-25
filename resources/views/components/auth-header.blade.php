@props(['title', 'subtitle' => null])

<div class="mb-8 text-center">
    <p class="section-label">Account</p>
    <h1 class="mt-2 font-serif text-3xl text-chocolate-800">{{ $title }}</h1>
    @if ($subtitle)
        <p class="mt-3 text-sm leading-relaxed text-neutral-500">{{ $subtitle }}</p>
    @endif
</div>
