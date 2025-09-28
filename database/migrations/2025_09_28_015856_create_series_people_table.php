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
        Schema::create('series_person', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the pivot record');
                 $table->foreignId('series_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the series table');
                 $table->foreignId('person_id')->constrained('persons')->onDelete('cascade')->comment('Foreign key referencing the persons table');
                 $table->string('role')->nullable()->comment('Role of the person, e.g., Director, Actor');
                 $table->timestamps();
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_people');
    }
};
