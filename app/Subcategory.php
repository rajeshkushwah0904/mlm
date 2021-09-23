<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
       protected $fillable = [
       'name',
       'category_id',
      'added_by',
       'updated_by',
    ];
    public function category(){
	  return $this->belongsTo('App\Category','category_id','id');
	} 
}