<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Subscription extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'period',
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
    
    /**
     * expired
     *
     * @return Attribute
     */
    public function expired() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->end_at->isPast()
        );
    }
}
