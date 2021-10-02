<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
      'package_id',
             'amount',
              'distributor_tracking_id',
             'income_type',
              'sponsor_tracking_id',
             'sponsor_amount',
               'status', 
    ];
      
}