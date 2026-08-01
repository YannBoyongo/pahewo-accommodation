<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Static pages --}}
    <url>
        <loc>{{ route('home') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('rooms.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('dining') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('conference-meeting') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('experiences.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('our-story') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('about-pahewo') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('booking-inquiry.create') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('privacy') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    {{-- Dynamic room pages --}}
    @foreach ($rooms as $room)
    <url>
        <loc>{{ route('rooms.show', $room) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        @if ($room->updated_at)
        <lastmod>{{ $room->updated_at->toAtomString() }}</lastmod>
        @endif
    </url>
    @endforeach

    {{-- Dynamic experience pages --}}
    @foreach ($experiences as $experience)
    <url>
        <loc>{{ route('experiences.show', $experience) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @if ($experience->updated_at)
        <lastmod>{{ $experience->updated_at->toAtomString() }}</lastmod>
        @endif
    </url>
    @endforeach

</urlset>
