<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
      'package_id',
             'amount',
              'distributor_id',
             'income_type',
              'sponsor_id',
             'sponsor_amount',
               'status', 
               'level_id',
               'level',
               'level_percentage'
    ];
    
  public function distributor(){
	  return $this->belongsTo('App\Distributor','distributor_id','id');
	} 
    public function sponsor(){
	  return $this->belongsTo('App\Distributor','sponsor_id','id');
	} 
      
}