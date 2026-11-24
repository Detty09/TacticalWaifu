<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('character_goals', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });

        DB::table('character_goals')->orderBy('id')->each(function ($goal) {
            $parts = explode(' - ', $goal->description, 2);

            DB::table('character_goals')->where('id', $goal->id)->update([
                'name'        => trim($parts[0]),
                'description' => isset($parts[1]) ? trim($parts[1]) : $goal->description,
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       DB::table('character_goals')->orderBy('id')->each(function ($goal) {
            if ($goal->name !== null) {
                DB::table('character_goals')->where('id', $goal->id)->update([
                    'description' => $goal->name . ' - ' . $goal->description,
                ]);
            }
        });

        Schema::table('character_goals', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
