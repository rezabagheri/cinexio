<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'playlists' table with fields for user playlists.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('playlists', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the playlist');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->string('name')->comment('Name of the playlist, e.g., Watch Later');
                 $table->text('description')->nullable()->comment('Optional description of the playlist');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'playlists' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('playlists');
         }
     };
