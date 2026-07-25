@props(['settings'])

<ul class="mt-5 space-y-3 text-sm text-white/70">
    <li>
        Tel:
        <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="text-white transition hover:text-gold-400">
            {{ $settings->phone }}
        </a>
    </li>
    <li>
        <a href="mailto:{{ $settings->email }}" class="transition hover:text-gold-400">{{ $settings->email }}</a>
    </li>
    <li>{{ $settings->address }}</li>
</ul>

@if ($settings->facebook || $settings->instagram || $settings->linkedin)
    <div class="mt-5 flex flex-wrap gap-3">
        @if ($settings->facebook)
            <a href="{{ $settings->facebook }}" target="_blank" rel="noopener" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs font-medium text-white/80 transition hover:border-gold-400 hover:text-gold-300">Facebook</a>
        @endif
        @if ($settings->instagram)
            <a href="{{ $settings->instagram }}" target="_blank" rel="noopener" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs font-medium text-white/80 transition hover:border-gold-400 hover:text-gold-300">Instagram</a>
        @endif
        @if ($settings->linkedin)
            <a href="{{ $settings->linkedin }}" target="_blank" rel="noopener" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs font-medium text-white/80 transition hover:border-gold-400 hover:text-gold-300">LinkedIn</a>
        @endif
    </div>
@endif
