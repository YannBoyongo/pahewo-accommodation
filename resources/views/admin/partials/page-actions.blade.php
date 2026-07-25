@props(['title', 'createRoute' => null, 'createLabel' => 'Add new'])

<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <div>
        @if ($createRoute)
            <a href="{{ route($createRoute) }}" class="btn-primary">{{ $createLabel }}</a>
        @endif
    </div>
</div>
