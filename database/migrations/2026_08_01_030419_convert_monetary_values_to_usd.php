<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Restores pre-UGX amounts as USD (the earlier UGX conversion multiplied by 1,000).
     */
    public function up(): void
    {
        DB::table('rooms')->update([
            'price_per_night' => DB::raw('ROUND(price_per_night / 1000, 2)'),
        ]);

        DB::table('experiences')->whereNotNull('price')->update([
            'price' => DB::raw('ROUND(price / 1000, 2)'),
        ]);

        DB::table('bookings')->update([
            'total_price' => DB::raw('ROUND(total_price / 1000, 2)'),
            'impact_contribution' => DB::raw('ROUND(impact_contribution / 1000, 2)'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('rooms')->update([
            'price_per_night' => DB::raw('price_per_night * 1000'),
        ]);

        DB::table('experiences')->whereNotNull('price')->update([
            'price' => DB::raw('price * 1000'),
        ]);

        DB::table('bookings')->update([
            'total_price' => DB::raw('total_price * 1000'),
            'impact_contribution' => DB::raw('impact_contribution * 1000'),
        ]);
    }
};
