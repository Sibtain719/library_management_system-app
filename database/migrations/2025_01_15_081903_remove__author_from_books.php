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
        Schema::table('books', function (Blueprint $table) {
            // $table->dropColumn('Category');
            $table->foreign('Author_Name')->references('id')->on('books')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Schema::dropColumns('books', ['Author']);
            // ?Schema::dropColumns('books', ['Category']);
            
           
        });
    }
};
