<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
       'name',
            'hsn_code',
            'product_code',
            'category_id',
            'subcategory_id',
            'serial_no',
            'description',
            'image',
    ];
        public function category(){
	  return $this->belongsTo('App\Category','category_id','id');
	} 
        public function subcategory(){
	  return $this->belongsTo('App\Subcategory','category_id','id');
	} 

      		public function product_price(){
		return $this->hasOne('App\ProductPrice','product_id','id');
	}

}