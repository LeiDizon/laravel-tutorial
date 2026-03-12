<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tutorial Concept: Database Migrations
 *
 * Migrations are like version control for your database. They allow you to
 * define your database schema in PHP code and share it with your team.
 *
 * Each migration has an "up" method (apply changes) and a "down" method (undo).
 * Run migrations with: php artisan migrate
 * Rollback with: php artisan migrate:rollback
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Tutorial: Schema::create() creates a new database table.
     * Blueprint provides a fluent interface for defining columns.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                           // Auto-incrementing primary key
            $table->string('title');                // VARCHAR column
            $table->text('body');                   // TEXT column for long content
            $table->string('author');               // VARCHAR for author name
            $table->timestamps();                   // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * Tutorial: Schema::dropIfExists() removes the table if it exists.
     * This is called when you run: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
