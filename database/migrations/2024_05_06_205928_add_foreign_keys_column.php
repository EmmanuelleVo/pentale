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
        Schema::table('chapters', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('characters', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('threads', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('discussions', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('thread_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('book_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('thread_category', function (Blueprint $table) {
            $table->foreignId('thread_id')->constrained()->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade') ?
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('book_tag', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('book_genre', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('genre_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropConstrainedForeignId('book_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('user_id');
        });
        Schema::table('characters', function (Blueprint $table) {
            $table->foreignId('book_id');
        });
        Schema::table('threads', function (Blueprint $table) {
            $table->foreignId('user_id');
        });
        Schema::table('discussions', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('thread_id');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('book_id');
        });
        Schema::table('thread_category', function (Blueprint $table) {
            $table->foreignId('thread_id'); // ->onDelete('cascade') ?
            $table->foreignId('category_id');
        });
        Schema::table('book_tag', function (Blueprint $table) {
            $table->foreignId('book_id');
            $table->foreignId('tag_id');
        });
        Schema::table('book_genre', function (Blueprint $table) {
            $table->foreignId('book_id');
            $table->foreignId('genre_id');
        });
    }
};
