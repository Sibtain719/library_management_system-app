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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('Title')->nullable();
            $table->string('No_of_copies')->nullable();
            // $table->string('Category')->nullable();
            $table->string('Published_date')->nullable();
            $table->string('Availibility')->nullable();
            $table->string('Borrowed_by')->nullable();
            $table->string('Actions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('books');
      
    }
};
