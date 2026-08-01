<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::table('hero_sections')->count() !== 1) {
            return;
        }

        $now = now();

        DB::table('hero_sections')->insert([
            [
                'label' => 'More Than a Stay',
                'heading' => 'A Gift of Hope',
                'description' => 'Welcome to Endo Wellness Accommodation — a place of comfort, care, and purpose. Every booking helps support women and girls living with endometriosis across Africa.',
                'image_alt' => 'Comfortable boutique hotel bedroom',
                'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'label' => 'Rest With Meaning',
                'heading' => 'Hospitality That Heals',
                'description' => 'Rest with comfort. Stay with purpose. Create hope — one booking at a time.',
                'image_alt' => 'Warm and inviting guest suite',
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'sort_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('hero_sections')
            ->whereIn('heading', ['A Gift of Hope', 'Hospitality That Heals'])
            ->delete();
    }
};
