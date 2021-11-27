<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
     protected $fillable = [
         'package_name',
            'amount',
            'sponsor_income',
            'business_volume'
    ];
    		public function package_products(){
		return $this->hasMany('App\PackageProduct','package_id','id');
	}
}