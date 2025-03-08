<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Creates the `task_tag` pivot table for the many-to-many relationship between tasks and tags.
     */
    public function up()
    {
        Schema::create('task_tag', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('task_id')->constrained()->onDelete('cascade'); // Reference to tasks
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Reference to tags
        });
    }

    /**
     * Reverse the migrations.
     * Drops the `task_tag` table.
     */
    public function down()
    {
        Schema::dropIfExists('task_tag');
    }
};
