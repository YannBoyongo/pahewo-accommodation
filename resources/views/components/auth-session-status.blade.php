@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'mb-4 rounded-xl bg-chocolate-50 px-4 py-3 text-sm font-medium text-chocolate-800 ring-1 ring-chocolate-100']) }}>
        {{ $status }}
    </div>
@endif
