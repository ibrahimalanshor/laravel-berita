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
        'active',
        'package_id',
        'package_name',
        'package_price',
        'premium',
        'newsletter',
        'no_ads',
        'premium_articles',
        'start_at',
        'end_at'
    ];
    
    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'end_at' => 'datetime',
        'start_at' => 'datetime',
    ];
    
    /**
     * package
     *
     * @return void
     */
    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }
}
