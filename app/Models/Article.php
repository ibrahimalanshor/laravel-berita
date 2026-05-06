<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{            
    use Searchable;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['trending_score'];
    
    /**
     * casts
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'thumbnails' => 'array',
            'published_at' => 'datetime'
        ];
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        if (config('scout.driver') === 'database') {
            return [
                'title' => $this->title,
                'summary' => $this->summary,
                'content' => $this->content,
            ];
        }

        return [
            'title' => $this->title,
            'summary' => $this->summary,
            'content' => strip_tags($this->content),
            'category' => $this->category->name ?? null,
            'tags' => $this->tags->pluck('name')->toArray(),
            'published_at' => $this->published_at?->timestamp
        ];
    }

    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return !is_null($this->published_at);
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
