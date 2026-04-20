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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->decimal('package_price', 8, 2);
            $table->boolean('active')->default(true);
            $table->boolean('premium')->default(false);
            $table->boolean('newsletter')->default(false);
            $table->boolean('no_ads')->default(false);
            $table->boolean('premium_articles')->default(false);
            $table->foreignId('package_id')->constrained('subscription_packages')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
