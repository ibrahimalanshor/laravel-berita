<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use App\Models\Menu;
use App\Models\Page;
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
                'name' => 'Politik',
                'url'  => '/kategori/politik',
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

        $footerCategoryMenus = ArticleCategory::take(10)
            ->get();

        foreach ($navbarMenus as $menu) {
            Menu::create([
                'type' => 'navbar',
                ...$menu
            ]);
        }

        $footerPageMenus = Page::take(10)
            ->get();

        foreach ($footerCategoryMenus as $category) {
            Menu::create([
                'type' => 'footer_category',
                'name' => $category->name,
                'url' => route('category.detail', ['category' => $category->slug])
            ]);
        }

        foreach ($footerPageMenus as $page) {
            Menu::create([
                'type' => 'footer_page',
                'name' => $page->title,
                'url' => route('page.detail', ['page' => $page->slug])
            ]);
        }
    }
}
