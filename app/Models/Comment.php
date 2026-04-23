<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'avatar_url', 'content'];
}
