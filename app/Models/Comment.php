<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'avatar_url', 'content', 'likes', 'dislikes'];
    
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
