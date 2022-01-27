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
        'product_id',
        'mrp',
        'distributor_price',
        'business_volume',
        'cgst_rate',
        'cgst_amount',
        'sgst_rate',
        'sgst_amount',
        'igst_rate',
        'igst_amount',
        'tax_amount',
        'total_amount',
    ];
}