<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
             protected $fillable = [
      'product_id',
            'mrp',
            'distributor_price',
           'bussiness_volume',
            'actual_price'
    ];
}