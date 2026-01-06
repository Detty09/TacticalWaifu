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

            $table->foreignId('character_goal_id')->constrained()->cascadeOnDelete();
            $table->text('player_goal')->nullable();

            $table->foreignId('dere_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hair_color_id')->constrained()->cascadeOnDelete();
            $table->foreignId('eye_color_id')->constrained()->cascadeOnDelete();

            $table->unsignedTinyInteger('number'); // 2–5
            $table->unsignedSmallInteger('height_cm'); // 140–210

            $table->string('access_password')->nullable();

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
