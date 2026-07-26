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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('footer_brand_name')->default('Stay with Purpose');
            $table->text('footer_description')->nullable();
            $table->string('footer_partner_text')->default('PAHEWO - www.pahewo.org');
            $table->string('footer_partner_url')->default('https://www.pahewo.org');
            $table->string('google_reviews_url')->nullable();
            $table->text('footer_wellness_message')->nullable();
        });

        DB::table('settings')->update([
            'footer_description' => 'A boutique hotel in Kampala, Uganda where every booking funds 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis - a condition that never clocks out, met by care that never closes.',
            'google_reviews_url' => 'https://www.google.com/search?q=Endo+Wellness+Accommodation+Kampala',
            'footer_wellness_message' => "Endometriosis pain doesn't keep business hours. Our wellness line - funded by your stay - is answered every hour of every day.",
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'footer_brand_name',
                'footer_description',
                'footer_partner_text',
                'footer_partner_url',
                'google_reviews_url',
                'footer_wellness_message',
            ]);
        });
    }
};
