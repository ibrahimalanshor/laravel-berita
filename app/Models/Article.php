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
}
