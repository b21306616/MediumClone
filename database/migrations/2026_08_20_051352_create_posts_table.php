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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // The nullable() means that the image column can be left empty (null) when creating or updating a post.
            $table->string('title');

            // Creates a slug column that stores a unique string value (in the database posts table). The unique() method ensures that no two (or more) posts can have the same slug value.
            $table->string('slug')->unique();

            $table->longText('content');

            // creates a foreign key column called category_id that references the id column in the categories table.
            // The onDelete('cascade') method specifies that if a category is deleted, all associated posts will also be deleted.
            // The constrained() method means that if there is no category with the given id, the database will not allow the post to be created (it enforces referential integrity).
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // If the published_at column is null, it means the post is not published yet.
            // If it is in the future, it means the post is scheduled to be published at that time. If it is in the past, it means the post has already been published.
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
