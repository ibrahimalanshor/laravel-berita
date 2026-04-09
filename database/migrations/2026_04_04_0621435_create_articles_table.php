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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->unique();
            $table->string('summary');
            $table->string('thumbnail_url');
            $table->string('thumbnail_caption');
            $table->boolean('featured')->default(false);
            $table->text('content');
            $table->datetime('published_at')->nullable();
            $table->foreignId('category_id')->constrained('article_categories')->restrictOnDelete();
            $table->foreignId('author_id')->constrained('authors')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
