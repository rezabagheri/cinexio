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
        Schema::create('movie_tag', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the pivot record');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('tag_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the tags table');
                 $table->timestamps();
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_tags');
    }
};
