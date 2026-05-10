<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'logo_url', 'icon_url', 'banner_url'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function (Setting $setting) {
            Cache::forget('setting');
        });
    }
}
