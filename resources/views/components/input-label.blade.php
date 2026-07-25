@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold uppercase tracking-[0.18em] text-chocolate-700']) }}>
    {{ $value ?? $slot }}
</label>
