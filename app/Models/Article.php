<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{    
    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
