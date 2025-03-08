<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Creates the `categories` table.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->unique(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     * Drops the `categories` table.
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
