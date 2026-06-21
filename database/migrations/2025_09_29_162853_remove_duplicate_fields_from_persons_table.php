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
        Schema::table('persons', function (Blueprint $table) {
            $table->dropColumn(['birthdate', 'deathdate']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->date('birthdate')->nullable()->comment('Birthdate of the person')->after('imdb_id');
            $table->date('deathdate')->nullable()->comment('Deathdate if deceased')->after('birthdate');

        });
    }
};
