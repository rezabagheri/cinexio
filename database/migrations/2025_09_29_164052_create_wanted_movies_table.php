<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\WantedStatus;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wanted_movies', function (Blueprint $table) {
            $table->id()->comment('Primary key for the wanted movie');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('User who wants the movie');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Movie being requested');
            $table->foreignId('movie_version_id')->nullable()->constrained()->onDelete('set null')->comment('Specific version of the movie, if applicable');
            $table->text('note')->nullable()->comment('Optional note from the user about the request');
            $table->enum('status', WantedStatus::cases())->default('searching')->comment('Status of the request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wanted_movies');
    }
};
