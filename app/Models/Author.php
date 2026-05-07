<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Author extends Model implements Sitemapable
{
    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    /**
     * toSitemapTag
     *
     * @return Url
     */
    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('author.detail', $this))
            ->setLastModificationDate($this->updated_at);
    }
}
