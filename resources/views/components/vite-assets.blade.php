@env('local')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    @php
        $viteManifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $viteManifest['resources/css/app.css']['file']) }}">
    <script src="{{ asset('build/' . $viteManifest['resources/js/app.js']['file']) }}" defer></script>
@endenv
