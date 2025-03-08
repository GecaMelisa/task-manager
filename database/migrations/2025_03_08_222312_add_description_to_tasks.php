<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Modifies the `description` column in the `tasks` table to allow NULL values.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('description')->nullable()->change(); // Allow NULL values
        });
    }

    /**
     * Reverse the migrations.
     * Reverts the `description` column to NOT NULL.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('description')->nullable(false)->change(); // Revert back to NOT NULL
        });
    }
};
