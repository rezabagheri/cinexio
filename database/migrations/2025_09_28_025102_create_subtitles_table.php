<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'subtitles' table with fields for subtitle information.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('subtitles', function (Blueprint $table) {
            $table->id()->comment('Primary key for the subtitle');
            $table->foreignId('disk_id')->constrained('disks')->comment('Foreign key referencing the disks table, nullable if not stored');
            $table->string('language')->comment('Language of the subtitle, e.g., English');
            $table->string('file_path')->nullable()->comment('File path of the subtitle on the disk');
            $table->string('format')->nullable()->comment('Format of the subtitle file, e.g., SRT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'subtitles' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('subtitles');
    }
};
