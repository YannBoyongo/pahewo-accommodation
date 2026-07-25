<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'map_embed',
        'directions_url',
        'facebook',
        'instagram',
        'linkedin',
    ];

    public static function instance(): self
    {
        return static::query()->firstOrCreate(
            ['id' => 1],
            [
                'phone' => '+256 700 000 000',
                'email' => 'hello@staywithpurpose.ug',
                'address' => 'Kampala, Uganda',
            ],
        );
    }
}
