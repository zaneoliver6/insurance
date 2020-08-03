<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname', 
        'marital_status',
        'full_name',
        'email',
        'is_lead',
        'dob',
        'address_id',
        'phone_id',
        'employee_id',
        'created_by',
        'company_id',
    ];
}
