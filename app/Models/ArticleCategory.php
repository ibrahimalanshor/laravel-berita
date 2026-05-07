<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class ArticleCategory extends Model implements Sitemapable
{    
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (ArticleCategory $category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
    
    /**
     * toSitemapTag
     *
     * @return Url
     */
    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('category.detail', $this))
            ->setLastModificationDate($this->updated_at);
    }
}
