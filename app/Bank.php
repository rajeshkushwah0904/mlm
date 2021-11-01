<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'account_holder_name',
        'account_number',
        'account_type',
        'ifsc_code',
        'bank_name',
        'bank_branch',
        'added_by',
        'updated_by',
        'status',
    ];
}