<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{
   protected $fillable = [
        'product_id',
        'price',
        'qty',
        'distributor_id'
    ];

    
    	public function product(){
	  return $this->belongsTo('App\Product','product_id','id');
	} 
}