@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'hero-nav-link text-gold-300'
        : 'hero-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
