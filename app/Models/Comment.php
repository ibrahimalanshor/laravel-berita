<?php

namespace App\Models;

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
    protected $fillable = ['user_id', 'reply_id', 'name', 'avatar_url', 'content', 'likes', 'dislikes'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (Comment $comment) {
            if ($comment->reply_id) {
                $comment->article_id = $comment->reply->article_id;
            }
        });
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
}
