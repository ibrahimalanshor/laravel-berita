<?php

namespace App\Models;

use App\Support\StructuredData\Features\Author as AuthorFeature;
use App\Support\StructuredData\SchemaReady;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Author extends Model implements Sitemapable, SchemaReady
{
    use HasFactory;
    
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
    
    /**
     * toSchema
     *
     * @return AuthorFeature
     */
    public function toSchema(): AuthorFeature
    {
        return new AuthorFeature(
            name: $this->name,
            description: Str::of($this->about)->stripTags()->limit(100),
            url: route('author.detail', $this),
            image: $this->image_url,
            createdAt: $this->created_at,
            modifiededAt: $this->updated_at,
            links: [
                $this->instagram_url,
                $this->facebook_url,
                $this->twitter_url,
                $this->tiktok_url,
                $this->youtube_url,
            ]
        );
    }
}
