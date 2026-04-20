<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'package_id',
        'package_name',
        'package_price',
        'newsletter',
        'no_ads',
        'premium_articles'
    ];
}
