<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Tag extends Model implements Sitemapable
{    
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['trending_score'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (Tag $tag) {
            $tag->slug = Str::slug($tag->name);
        });
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    
    /**
     * hourlyArticles
     *
     * @return void
     */
    public function hourlyArticles()
    {
        return $this->hasMany(TagHourlyArticle::class);
    }
    
    /**
     * toSitemapTag
     *
     * @return Url
     */
    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('tag.detail', $this))
            ->setLastModificationDate($this->updated_at);
    }
}
