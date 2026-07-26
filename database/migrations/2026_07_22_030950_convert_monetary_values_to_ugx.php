<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('price_per_night', 14, 2)->change();
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->decimal('price', 14, 2)->nullable()->change();
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_price', 14, 2)->change();
            $table->decimal('impact_contribution', 14, 2)->default(0)->change();
        });

        DB::table('rooms')->update(['price_per_night' => DB::raw('price_per_night * 1000')]);
        DB::table('experiences')->whereNotNull('price')->update(['price' => DB::raw('price * 1000')]);
        DB::table('bookings')->update([
            'total_price' => DB::raw('total_price * 1000'),
            'impact_contribution' => DB::raw('impact_contribution * 1000'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('rooms')->update(['price_per_night' => DB::raw('price_per_night / 1000')]);
        DB::table('experiences')->whereNotNull('price')->update(['price' => DB::raw('price / 1000')]);
        DB::table('bookings')->update([
            'total_price' => DB::raw('total_price / 1000'),
            'impact_contribution' => DB::raw('impact_contribution / 1000'),
        ]);
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('price_per_night', 10, 2)->change();
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->change();
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->change();
            $table->decimal('impact_contribution', 10, 2)->default(0)->change();
        });

    }
};
