<x-admin-layout title="Settings" heading="Site Settings" description="Configuration">
    <form method="POST" action="{{ route('dashboard.settings.update') }}" class="card-luxe max-w-3xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <x-input-label for="phone" value="Phone" />
                <x-text-input id="phone" name="phone" type="tel" class="input-luxe mt-1" :value="old('phone', $setting->phone)" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="input-luxe mt-1" :value="old('email', $setting->email)" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="address" value="Address" />
            <textarea id="address" name="address" rows="3" class="input-luxe mt-1" required>{{ old('address', $setting->address) }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-8 border-t border-chocolate-100 pt-8">
            <p class="section-label">Location &amp; Map</p>
            <p class="mt-2 text-sm text-neutral-500">
                Paste a Google Maps <strong>embed iframe</strong> below to show a custom map on the website.
                Leave empty to auto-generate a map from the address above.
            </p>

            <div class="mt-6">
                <x-input-label for="directions_url" value="Directions URL (Google Maps link)" />
                <x-text-input id="directions_url" name="directions_url" type="url" class="input-luxe mt-1"
                    :value="old('directions_url', $setting->directions_url)"
                    placeholder="https://maps.app.goo.gl/..." />
                <p class="mt-1 text-xs text-neutral-400">Used for the "Get Directions" button. Leave empty to auto-generate from address.</p>
                <x-input-error :messages="$errors->get('directions_url')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="map_embed" value="Map Embed Code (iframe)" />
                <textarea id="map_embed" name="map_embed" rows="5" class="input-luxe mt-1 font-mono text-xs"
                    placeholder='&lt;iframe src="https://www.google.com/maps/embed?pb=..." ...&gt;&lt;/iframe&gt;'>{{ old('map_embed', $setting->map_embed) }}</textarea>
                <p class="mt-1 text-xs text-neutral-400">
                    In Google Maps, click <strong>Share → Embed a map</strong> and paste the full
                    <code class="rounded bg-chocolate-50 px-1 py-0.5 text-chocolate-700">&lt;iframe&gt;</code> code here.
                </p>
                <x-input-error :messages="$errors->get('map_embed')" class="mt-2" />
            </div>

            @if ($setting->map_embed)
                <div class="mt-5 overflow-hidden rounded-xl border border-chocolate-100">
                    <p class="border-b border-chocolate-100 bg-chocolate-50 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-chocolate-600">Preview</p>
                    <div class="aspect-video w-full [&>iframe]:h-full [&>iframe]:w-full">
                        {!! $setting->map_embed !!}
                    </div>
                </div>
            @endif
        </div>

        <div class="mt-8 border-t border-chocolate-100 pt-8">
            <p class="section-label">Social media</p>
            <p class="mt-2 text-sm text-neutral-500">Optional links shown in the website footer when provided.</p>

            <div class="mt-6 space-y-6">
                <div>
                    <x-input-label for="facebook" value="Facebook URL" />
                    <x-text-input id="facebook" name="facebook" type="url" class="input-luxe mt-1" :value="old('facebook', $setting->facebook)" placeholder="https://facebook.com/..." />
                    <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="instagram" value="Instagram URL" />
                    <x-text-input id="instagram" name="instagram" type="url" class="input-luxe mt-1" :value="old('instagram', $setting->instagram)" placeholder="https://instagram.com/..." />
                    <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="linkedin" value="LinkedIn URL" />
                    <x-text-input id="linkedin" name="linkedin" type="url" class="input-luxe mt-1" :value="old('linkedin', $setting->linkedin)" placeholder="https://linkedin.com/..." />
                    <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <x-primary-button>Save settings</x-primary-button>
        </div>
    </form>
</x-admin-layout>
