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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('avatar_url')->nullable();
            $table->string('name');
            $table->string('reply_name')->nullable();
            $table->string('report_type')->nullable();
            $table->string('content');
            $table->unsignedSmallInteger('likes')->default(0);
            $table->unsignedSmallInteger('dislikes')->default(0);
            $table->unsignedSmallInteger('replies_count')->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reply_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->timestamp('reported_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
