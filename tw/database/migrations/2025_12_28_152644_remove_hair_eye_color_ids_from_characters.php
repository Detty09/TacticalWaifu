<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->dropForeign(['hair_color_id']);
            $table->dropForeign(['eye_color_id']);

            $table->dropColumn(['hair_color_id', 'eye_color_id']);
        });
    }

    public function down(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->foreignId('hair_color_id')->constrained();
            $table->foreignId('eye_color_id')->constrained();
        });
    }
};
