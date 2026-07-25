<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HeroSection extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'label',
        'heading',
        'description',
        'image_alt',
        'image_url',
    ];

    public static function instance(): self
    {
        return static::query()->firstOrCreate(
            ['id' => 1],
            [
                'label' => 'Stay with Purpose.',
                'heading' => 'Help Heal with Us',
                'description' => 'Premium, ultra-secure apartments in Uganda where your travel experience directly funds 24/7 medical wellness, sanctuary, and dignity for women and young girls battling Endometriosis.',
                'image_alt' => 'Premium apartments with warm evening light',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=2000&auto=format&fit=crop',
            ],
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('hero')
            ->width(2000)
            ->nonQueued();
    }

    public function backgroundImageUrl(): string
    {
        return $this->getFirstMediaUrl('background', 'hero')
            ?: ($this->image_url ?? '');
    }
}
