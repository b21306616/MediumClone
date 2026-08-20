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
        // Creates a new table in the database called categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // creates id column (in the database categories table)
            $table->string('name'); // creates name column that stores a string value (in the database categories table)
            $table->timestamps(); // creates created_at and updated_at columns (in the database categories table)
        });
    }

    /**
     * Reverse the migrations.
     *
     * Whatever is done in the up() method should be reversed (opposite action) in the down() method. This is important for rolling back migrations if needed.
     *
     * For example, if the up() method creates a table, the down() method should drop that table. If the up() method adds a column, the down() method should remove that column.
     */
    public function down(): void
    {
        // Drops the categories table from the database
        Schema::dropIfExists('categories');
    }
};
