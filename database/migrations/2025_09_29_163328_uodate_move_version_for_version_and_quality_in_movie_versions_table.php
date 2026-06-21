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
        Schema::table('movie_versions', function (Blueprint $table) {
            $table->string('version_name', 255)->nullable()->comment('Version of the movie, e.g., Director\'s Cut, DVD, Theatrical')->change();
            $table->enum('quality', ['SD', 'HD', 'FullHD', 'BluRay', '4K', '8K'])->nullable()->comment('Quality of the movie version')->change();
            $table->string('format', 255)->nullable()->comment('Format of the movie, e.g., MP4, MKV, AVI')->after('quality');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_versions', function (Blueprint $table) {
            $table->string('version_name', 255)->nullable()->comment('Name of the version, e.g., Director\'s Cut')->change();
            $table->string('quality', 255)->nullable()->comment('Quality of the version, e.g., 1080p')->change();
            $table->dropColumn('format');

        });
    }
};
