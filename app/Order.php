<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
            'distributor_id',
            'distributor_name',
            'email',
            'mobile',
            'gender',
            'address',
            'pincode',
            'total_taxable_amount',
            'total_gst_amount',
            'delivery_amount',
            'total_discount',
            'total_amount',
    ];
}