<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webcontent extends Model
{
    protected $fillable = [
        'webcontent_type',
        'title',
        'description',
        'added_by',
        'status',
        'image',
    ];
}