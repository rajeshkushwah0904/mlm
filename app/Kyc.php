<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
       protected $fillable = [
       'pancard_no',
            'pancard_file',
            'aadhaarcard_no',
            'aadhaar_card_file',
            'account_holder_name',
            'account_number',
            'account_type',
            'ifsc_code',
            'bank_name',
            'bank_branch',
            'bank_document',
            'distributor_id',
            'distributor_user_id',
            'added_by',
            'updated_by',
    ];
}