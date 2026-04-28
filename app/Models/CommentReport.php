<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['report_type', 'user_id'];
}
