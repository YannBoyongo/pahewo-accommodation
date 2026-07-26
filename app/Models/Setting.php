<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'phone',
        'whatsapp_number',
        'email',
        'address',
        'map_embed',
        'directions_url',
        'facebook',
        'instagram',
        'linkedin',
        'footer_brand_name',
        'footer_description',
        'footer_partner_text',
        'footer_partner_url',
        'google_reviews_url',
        'footer_wellness_message',
    ];

    public static function instance(): self
    {
        return static::query()->firstOrCreate(
            ['id' => 1],
            [
                'phone' => '+256 700 000 000',
                'whatsapp_number' => '+256 700 000 000',
                'email' => 'hello@staywithpurpose.ug',
                'address' => 'Kampala, Uganda',
                'footer_brand_name' => 'Stay with Purpose',
                'footer_description' => 'A boutique hotel in Kampala, Uganda where every booking funds 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis - a condition that never clocks out, met by care that never closes.',
                'footer_partner_text' => 'PAHEWO - www.pahewo.org',
                'footer_partner_url' => 'https://www.pahewo.org',
                'google_reviews_url' => 'https://www.google.com/search?q=Endo+Wellness+Accommodation+Kampala',
                'footer_wellness_message' => "Endometriosis pain doesn't keep business hours. Our wellness line - funded by your stay - is answered every hour of every day.",
            ],
        );
    }
}
