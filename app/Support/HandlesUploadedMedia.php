<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

class HandlesUploadedMedia
{
    /**
     * @return array<string, list<string>>
     */
    public static function singleImageRules(string $field = 'cover', bool $required = false): array
    {
        return [
            $field => array_values(array_filter([
                $required ? 'required' : 'nullable',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:10240',
            ])),
        ];
    }

    /**
     * @return array<string, list<string>>
     */
    public static function galleryImageRules(string $field = 'gallery', int $max = 8): array
    {
        return [
            $field => ['nullable', 'array', 'max:'.$max],
            $field.'.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:10240'],
        ];
    }

    /**
     * @return array<string, list<string>>
     */
    public static function removalRules(): array
    {
        return [
            'remove_cover' => ['sometimes', 'boolean'],
            'remove_logo' => ['sometimes', 'boolean'],
            'remove_background' => ['sometimes', 'boolean'],
            'remove_gallery_media' => ['nullable', 'array'],
            'remove_gallery_media.*' => ['integer'],
        ];
    }

    public static function syncSingleImage(
        HasMedia $model,
        Request $request,
        string $collection,
        string $field,
        ?string $removeField = null,
    ): void {
        $removeField ??= 'remove_'.$field;

        if ($request->boolean($removeField)) {
            $model->clearMediaCollection($collection);
        }

        if ($request->hasFile($field)) {
            $model->clearMediaCollection($collection);
            $model->addMediaFromRequest($field)
                ->usingFileName(self::safeFileName($request->file($field)))
                ->toMediaCollection($collection);
        }
    }

    public static function syncGalleryImages(
        HasMedia $model,
        Request $request,
        string $collection = 'gallery',
        string $field = 'gallery',
    ): void {
        if ($request->filled('remove_gallery_media')) {
            $model->media()
                ->where('collection_name', $collection)
                ->whereIn('id', $request->input('remove_gallery_media'))
                ->get()
                ->each
                ->delete();
        }

        if (! $request->hasFile($field)) {
            return;
        }

        foreach ($request->file($field) as $file) {
            if (! $file instanceof UploadedFile || ! $file->isValid()) {
                continue;
            }

            $model->addMedia($file)
                ->usingFileName(self::safeFileName($file))
                ->toMediaCollection($collection);
        }
    }

    public static function safeFileName(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension() ?: $file->extension();

        return Str::uuid()->toString().'.'.strtolower($extension);
    }
}
