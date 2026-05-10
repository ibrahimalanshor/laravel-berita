<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            AuthorSeeder::class,
            TagSeeder::class,
            ArticleCategorySeeder::class,
            ArticleSeeder::class,
            PageSeeder::class,
            MenuSeeder::class,
            SocialLinkSeeder::class,
            SubscriptionPackageSeeder::class,
            UserSeeder::class
        ]);
    }
}
