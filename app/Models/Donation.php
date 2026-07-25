<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    protected $fillable = [
        'reference',
        'donor_name',
        'donor_email',
        'amount',
        'currency',
        'designation',
        'message',
        'status',
    ];

    /**
     * @return array{amount: string}
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public static function generateReference(): string
    {
        return 'DON-'.strtoupper(Str::random(8));
    }
}
