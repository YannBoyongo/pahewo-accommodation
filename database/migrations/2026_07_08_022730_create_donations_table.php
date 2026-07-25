<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('UGX');
            $table->string('designation')->default('general');
            $table->text('message')->nullable();
            $table->string('status')->default('pledged');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
