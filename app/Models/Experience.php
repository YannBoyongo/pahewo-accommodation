<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Experience extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'duration',
        'price',
        'image_url',
        'is_featured',
        'sort_order',
    ];

    /**
     * @return array{price: string, is_featured: string}
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_featured' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('card')
            ->width(900)
            ->nonQueued();
    }

    public function coverImageUrl(): string
    {
        return $this->getFirstMediaUrl('cover', 'card')
            ?: $this->getFirstMediaUrl('gallery', 'card')
            ?: ($this->image_url ?? '');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
