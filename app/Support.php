<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'distributor_id',
        'mobile',
        'email',
        'title',
        'description',
        'updated_by',
        'status',
    ];
    public function distributor()
    {
        return $this->belongsTo('App\Distributor', 'distributor_id', 'id');
    }
}