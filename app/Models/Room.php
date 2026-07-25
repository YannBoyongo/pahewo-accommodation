<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Room extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'price_per_night',
        'capacity',
        'size_sqm',
        'bed_setup',
        'amenities',
        'image_url',
        'is_featured',
        'sort_order',
    ];

    /**
     * @return array{amenities: string, price_per_night: string, is_featured: string}
     */
    protected function casts(): array
    {
        return [
            'amenities' => 'array',
            'price_per_night' => 'decimal:2',
            'is_featured' => 'boolean',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
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
