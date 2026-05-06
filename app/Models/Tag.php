<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{    
    use HasFactory;

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
}
