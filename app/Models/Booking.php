<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    /**
     * Share of every booking that funds PAHEWO's 24/7 endometriosis care.
     */
    public const IMPACT_SHARE = 0.15;

    protected $fillable = [
        'room_id',
        'reference',
        'guest_name',
        'guest_email',
        'guest_phone',
        'check_in',
        'check_out',
        'guests',
        'nights',
        'total_price',
        'impact_contribution',
        'special_requests',
        'status',
    ];

    /**
     * @return array{check_in: string, check_out: string, total_price: string, impact_contribution: string}
     */
    protected function casts(): array
    {
        return [
            'check_in' => 'date',
            'check_out' => 'date',
            'total_price' => 'decimal:2',
            'impact_contribution' => 'decimal:2',
        ];
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public static function generateReference(): string
    {
        return 'SWP-'.strtoupper(Str::random(8));
    }
}
