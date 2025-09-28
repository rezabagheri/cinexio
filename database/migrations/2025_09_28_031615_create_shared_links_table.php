<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'shared_links' table with fields for shared content links.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('shared_links', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the shared link');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->string('token')->unique()->comment('Unique token for the shared link');
                 $table->timestamp('expires_at')->nullable()->comment('Expiration time of the link');
                 $table->boolean('is_active')->default(true)->comment('Whether the link is active');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'shared_links' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('shared_links');
         }
     };
