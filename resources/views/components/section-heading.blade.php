@props(['label', 'title', 'description' => null, 'align' => 'center'])

<div @class(['reveal max-w-2xl', 'mx-auto text-center' => $align === 'center'])>
    <p class="section-label">{{ $label }}</p>
    <h2 class="mt-3 text-3xl font-semibold text-chocolate-800 sm:text-4xl">{{ $title }}</h2>
    @if ($description)
        <p class="mt-4 text-base leading-relaxed text-neutral-500">{{ $description }}</p>
    @endif
</div>
