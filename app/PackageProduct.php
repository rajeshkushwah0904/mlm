<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
         protected $fillable = [
         'package_id',
           'service_name',
             'price',
            'hsn_sac',
            'gst_rate',
    ];

  
     

}