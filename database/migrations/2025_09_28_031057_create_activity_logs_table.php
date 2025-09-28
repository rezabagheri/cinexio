<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'activity_log' table with fields for user activities.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('activity_log', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the activity log');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->string('action')->comment('Type of action, e.g., watched, added_to_favorites');
                 $table->morphs('subject'); // برای رابطه polymorphic با movies, playlists, etc.
                 $table->timestamp('created_at')->comment('Time of the activity');
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'activity_log' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('activity_log');
         }
     };
