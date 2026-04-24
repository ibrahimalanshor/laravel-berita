<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReaction extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'reaction'];
}
