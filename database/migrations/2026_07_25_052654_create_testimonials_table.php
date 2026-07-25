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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->string('stay_type')->nullable();
            $table->text('quote');
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('testimonials')->insert([
            [
                'guest_name' => 'Recent Guest',
                'stay_type' => 'Leisure stay',
                'quote' => 'The welcome felt personal from the moment I arrived. My room was peaceful, beautifully prepared, and the team made every detail of my stay feel effortless.',
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'guest_name' => 'Recent Guest',
                'stay_type' => 'Business stay',
                'quote' => 'A calm and thoughtful place to return to after a busy day in Kampala. The service was warm, the room was comfortable, and breakfast was a genuine highlight.',
                'is_published' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'guest_name' => 'Recent Guest',
                'stay_type' => 'International traveller',
                'quote' => 'What stayed with me most was the sense of purpose behind the hospitality. It is a beautiful place to rest, with a story that makes the experience even more meaningful.',
                'is_published' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
