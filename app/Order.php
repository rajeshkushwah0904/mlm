<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'distributor_id',
        'distributor_name',
        'gst_no',
        'email',
        'mobile',
        'gender',
        'address',
        'pincode',
        'total_taxable_amount',
        'total_gst_amount',
        'delivery_amount',
        'total_discount',
        'total_amount',
        'invoice_no',
        'grand_total',
    ];

    public function distributor()
    {
        return $this->belongsTo('App\Distributor', 'distributor_id');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct', 'order_id', 'id');
    }

}