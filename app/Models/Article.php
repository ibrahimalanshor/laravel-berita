<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{        
    /**
     * casts
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'thumbnails' => 'array'
        ];
    }

    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
    
    /**
     * tags
     *
     * @return void
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    /**
     * author
     *
     * @return void
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    /**
     * comments
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * dailyViews
     *
     * @return void
     */
    public function dailyViews()
    {
        return $this->hasMany(ArticleDailyView::class);    
    }
}
