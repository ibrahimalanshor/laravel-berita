<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (Menu $menu) {
            if ($menu->category_id) {
                $menu->name = $menu->category->name;
                $menu->url = route('category.detail', ['category' => $menu->category]);
            }
        });
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
}
