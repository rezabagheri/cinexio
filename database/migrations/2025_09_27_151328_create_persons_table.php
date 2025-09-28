<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'persons' table to store information about individuals (e.g., directors, actors).
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('persons', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the person');
                 $table->string('name')->comment('Full name of the person, e.g., Christopher Nolan');
                 $table->date('birth_date')->nullable()->comment('Date of birth of the person');
                 $table->date('death_date')->nullable()->comment('Date of death of the person, if applicable');
                 $table->text('biography')->nullable()->comment('Short biography of the person');
                 $table->string('nationality')->nullable()->comment('Nationality of the person');
                 $table->timestamps();
                 $table->index('name');
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'persons' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('persons');
         }
     };
