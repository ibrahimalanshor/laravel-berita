<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['external_id', 'package_period', 'invoice_url', 'amount'];
    
    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
