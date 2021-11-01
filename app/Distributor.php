<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'distributor_tracking_id',
        'address',
        'mobile',
        'status',
        'distributor_is_paid',
        'sponsor_id',
        'nominee',
        'joining_date',
        'activate_date',
        'dob',
        'wallet_amount',
        'total_income',
        'gender',
        'profile_image',
        'pincode',
        'total_wallet_amount',
        'used_wallet_amount',
        'remaining_wallet_amount',
    ];

    protected $dates = [
        'joining_date',
        'activate_date',
        'dob',
    ];

    public function my_sponsor()
    {
        return $this->belongsTo('App\Distributor', 'sponsor_id', 'id');
    }

    public function first_level_distributors()
    {
        return $this->hasMany('App\Distributor', 'sponsor_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo('App\Package', 'package_id', 'id');
    }

    public function total_direct()
    {
        return $this->hasMany('App\DistributorLevel', 'L1', 'id');
    }

    public function kyc()
    {
        return $this->hasOne('App\Kyc', 'distributor_id', 'id');
    }

}