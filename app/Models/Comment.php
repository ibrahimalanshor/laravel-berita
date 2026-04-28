<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['article_id', 'user_id', 'reply_id', 'name', 'avatar_url', 'content', 'likes', 'dislikes', 'reply_name', 'reported_at', 'report_type', 'reporter_id'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(function (Comment $comment) {
            if ($comment->reply_id) {
                $comment->article_id = $comment->reply->article_id;
            }
        });
        static::created(function (Comment $comment) {
            if ($comment->reply_id) {
                $comment->reply->increment('replies_count');
            }
        });
    }
    
    /**
     * article
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
    
    /**
     * reply
     *
     * @return BelongsTo
     */
    public function reply(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
    
    /**
     * replies
     *
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'reply_id');
    }
    
    /**
     * reactions
     *
     * @return HasMany
     */
    public function reactions(): HasMany
    {
        return $this->hasMany(CommentReaction::class);
    }
    
    /**
     * reports
     *
     * @return HasMany
     */
    public function reports(): HasMany
    {
        return $this->hasMany(CommentReport::class);
    }
    
    /**
     * reported
     *
     * @return Attribute
     */
    public function reported(): Attribute
    {
        return Attribute::make(fn () => !is_null($this->reported_at));
    }
}
