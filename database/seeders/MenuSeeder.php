<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navbarMenus = [
            [
                'name' => 'News',
                'url'  => '/news',
            ],
            [
                'name' => 'Bisnis',
                'url'  => '/kategori/bisnis',
            ],
            [
                'name' => 'Ekonomi',
                'url'  => '/kategori/ekonomi',
            ],
            [
                'name' => 'Olahraga',
                'url'  => '/kategori/olahraga',
            ],
        ];

        foreach ($navbarMenus as $menu) {
            Menu::create([
                'type' => 'navbar',
                ...$menu
            ]);
        }
    }
}
