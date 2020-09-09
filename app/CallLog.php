<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'interested', 
        'date_of_interest', 
        'notes',
        'address_id',
        'phone_id',
        'customer_id',
        'created_by',
    ];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function phone()
    {
        return $this->belongsTo('App\Phone');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
