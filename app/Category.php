<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
       'name',
       'added_by',
       'updated_by',
    ];
        public function subcategories(){
		return $this->hasMany('App\Subcategory','category_id');
	}	
}