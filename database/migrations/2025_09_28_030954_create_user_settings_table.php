<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'user_settings' table with fields for user preferences.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('user_settings', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the user setting');
                 $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table, unique per user');
                 $table->string('language')->nullable()->comment('Preferred language, e.g., en, fa');
                 $table->boolean('notifications_enabled')->default(true)->comment('Whether notifications are enabled');
                 $table->string('theme')->nullable()->comment('Preferred theme, e.g., light, dark');
                 $table->json('settings')->nullable()->comment('Flexible JSON for additional user preferences');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'user_settings' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('user_settings');
         }
     };
