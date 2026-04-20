<?php

namespace Database\Seeders;

use App\Models\SubscriptionPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPackage::create([
            'name' => 'Lararita Newsletter',
            'slug' => Str::slug('Lararita Newsletter'),
            'price' => 0,
            'newsletter' => true
        ]);
        SubscriptionPackage::create([
            'name' => 'Lararita Plus',
            'slug' => Str::slug('Lararita Plus'),
            'price' => 15000,
            'featured' => true,
            'premium' => true,
            'newsletter' => true,
            'no_ads' => true,
            'premium_articles' => true
        ]);
    }
}
