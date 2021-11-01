<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'tag',
        'criteria',
        'cash',
        'reward',
        'business_amount',
        'updated_by',
        'status',
    ];
}