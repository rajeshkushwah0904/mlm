<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletUse extends Model
{
    protected $fillable = [
        'distributor_id',
        'wallet_amount',
        'use_type',
        'order_id',
        'account_holder_name',
        'account_number',
        'account_type',
        'ifsc_code',
        'bank_name',
        'bank_branch',
    ];
}