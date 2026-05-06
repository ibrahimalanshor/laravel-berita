<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagHourlyArticle extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['datetime', 'articles'];
}
