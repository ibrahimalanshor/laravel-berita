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
        Schema::create('tag_hourly_articles', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime');
            $table->unsignedInteger('articles')->default(0);
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['tag_id', 'datetime']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_hourly_articles');
    }
};
