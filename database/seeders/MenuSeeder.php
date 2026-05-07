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
        $categoryMenus = ArticleCategory::orderBy('featured', 'desc')
            ->orderBy('created_desc')
            ->take(10)
            ->get();

        foreach ($categoryMenus->take(4) as $category) {
            Menu::create([
                'type' => 'navbar',
                'category_id' => $category->id
            ]);
        }

        foreach ($categoryMenus as $category) {
            Menu::create([
                'type' => 'footer_category',
                'category_id' => $category->id
            ]);
        }

        $footerPageMenus = Page::take(10)
            ->get();

        foreach ($footerPageMenus as $page) {
            Menu::create([
                'type' => 'footer_page',
                'page_id' => $page->id
            ]);
        }
    }
}
