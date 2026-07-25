<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'content',
    ];

    /**
     * @return array{content: string}
     */
    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }

    public static function managed(string $slug): self
    {
        $definition = config('content-pages.'.$slug);

        if (! is_array($definition)) {
            throw new InvalidArgumentException("The page [{$slug}] is not managed.");
        }

        return static::query()->firstOrCreate(
            ['slug' => $slug],
            [
                'name' => $definition['name'],
                'content' => collect($definition['fields'])
                    ->mapWithKeys(fn (array $field, string $key): array => [$key => $field['default'] ?? null])
                    ->all(),
            ],
        );
    }

    public function value(string $key, mixed $fallback = null): mixed
    {
        $content = $this->content ?? [];

        if (array_key_exists($key, $content) && $content[$key] !== null && $content[$key] !== '') {
            return $content[$key];
        }

        return config("content-pages.{$this->slug}.fields.{$key}.default", $fallback);
    }

    public function imageUrl(string $collection): string
    {
        return $this->getFirstMediaUrl($collection, 'page')
            ?: (string) config("content-pages.{$this->slug}.fields.{$collection}.default", '');
    }

    public function registerMediaCollections(): void
    {
        collect(config('content-pages', []))
            ->flatMap(fn (array $page): array => $page['fields'])
            ->filter(fn (array $field): bool => ($field['type'] ?? null) === 'image')
            ->keys()
            ->unique()
            ->each(fn (string $collection) => $this->addMediaCollection($collection)->singleFile());
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('page')
            ->width(1800)
            ->nonQueued();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
