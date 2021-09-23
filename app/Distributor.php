<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
       protected $fillable = [
        'name',
            'email',
            'distributor_tracking_id',
            'address',
            'mobile',
            'status',
            'distributor_is_paid',
            'sponsor_tracking_id',
            'nominee',
            'joining_date',
            'activate_date',
    ];
}