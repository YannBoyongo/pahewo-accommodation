<?php

namespace App\Models;

use Database\Factories\HeroSectionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HeroSection extends Model implements HasMedia
{
    /** @use HasFactory<HeroSectionFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'label',
        'heading',
        'description',
        'image_alt',
        'image_url',
        'is_published',
        'sort_order',
    ];

    /**
     * @return array{is_published: string, sort_order: string}
     */
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * @param  Builder<HeroSection>  $query
     * @return Builder<HeroSection>
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * @param  Builder<HeroSection>  $query
     * @return Builder<HeroSection>
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * @return Collection<int, HeroSection>
     */
    public static function publishedSlides(): Collection
    {
        $slides = static::query()->published()->ordered()->get();

        if ($slides->isNotEmpty()) {
            return $slides;
        }

        return collect([static::ensureDefault()]);
    }

    public static function ensureDefault(): self
    {
        $existing = static::query()->ordered()->first();

        if ($existing) {
            return $existing;
        }

        return static::query()->create([
            'label' => 'Stay with Purpose.',
            'heading' => 'Help Heal with Us',
            'description' => 'Premium, ultra-secure apartments in Uganda where your travel experience directly funds 24/7 medical wellness, sanctuary, and dignity for women and young girls battling Endometriosis.',
            'image_alt' => 'Premium apartments with warm evening light',
            'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=2000&auto=format&fit=crop',
            'is_published' => true,
            'sort_order' => 1,
        ]);
    }

    /**
     * @deprecated Use publishedSlides() or ensureDefault()
     */
    public static function instance(): self
    {
        return static::ensureDefault();
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
