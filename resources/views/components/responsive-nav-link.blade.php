@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'mobile-nav-link text-gold-400'
        : 'mobile-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
