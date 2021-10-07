<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributorLevel extends Model
{
    protected $fillable = [
      'L0',
            'L1',
            'L2',
           'L3',
            'L4'
    ];
}