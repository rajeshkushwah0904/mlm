<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_name',
        'product_taxable_amount',
        'total_product_taxable_amount',
        'product_gst_amount',
        'product_amount',
        'qty',
    ];
}