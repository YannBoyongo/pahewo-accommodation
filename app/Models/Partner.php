<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'website_url',
        'logo_url',
        'is_featured',
    ];

    /**
     * @return array{is_featured: string}
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->nonQueued();
    }

    public function logoUrl(): string
    {
        return $this->getFirstMediaUrl('logo', 'thumb') ?: ($this->logo_url ?? '');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
