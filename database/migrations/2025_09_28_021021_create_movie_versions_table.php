<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'movie_versions' table with fields for different versions of movies.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('movie_versions', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the movie version');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('disk_id')->constrained('disks')->comment('Foreign key referencing the disks table, nullable if not stored');
                 $table->string('version_name')->nullable()->comment('Name of the version, e.g., Director\'s Cut');
                 $table->string('file_path')->nullable()->comment('File path on the disk');
                 $table->integer('file_size')->nullable()->comment('Size of the file in megabytes');
                 $table->string('quality')->nullable()->comment('Quality of the version, e.g., 1080p');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'movie_versions' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('movie_versions');
         }
     };
