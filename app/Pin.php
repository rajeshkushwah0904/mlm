<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
   protected $fillable = [
        'package_id',
            'transfer_to',
           'used_by',
            'status',
          'added_id',
           'updated_id',
           'generated_pin'
    ];
            public function package(){
	  return $this->belongsTo('App\Package','package_id','id');
	} 
                public function distributor(){
	  return $this->belongsTo('App\Distributor','transfer_to','distributor_tracking_id');
	} 
}