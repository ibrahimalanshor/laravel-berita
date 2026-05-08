<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

#[Signature('app:create-sitemap')]
#[Description('Command description')]
class CreateSitemap extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Sitemap::create()
            ->add(Url::create('/')->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY))
            ->add(Url::create('/berita')->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY))
            ->add(Url::create('/pilihan-editor')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create('/premium')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create('/subscribe')->setPriority(0.1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Article::whereNotNull('published_at')->get())
            ->add(ArticleCategory::whereNotNull('published_at')->get())
            ->add(Page::whereNotNull('published_at')->get())
            ->add(Author::whereNotNull('published_at')->get())
            ->add(Tag::whereNotNull('published_at')->get())
            ->writeToFile(public_path('sitemap.xml'));
    }
}
