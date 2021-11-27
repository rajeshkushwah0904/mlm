<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
         protected $fillable = [
        		'package_id',
            'product_id',
            'qty',
            'business_volume'
    ];

        		public function product(){
		return $this->belongsTo('App\Product','product_id','id');
	}

  
     

}