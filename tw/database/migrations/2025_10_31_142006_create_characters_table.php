<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('character_goal_id')->constrained()->cascadeOnDelete();
            $table->text('player_goal')->nullable();
            $table->foreignId('dere_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('hair_color_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedInteger('height_cm')->nullable();
            $table->foreignId('eye_color_id')->constrained()->cascadeOnDelete();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
