<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalDocument extends Model
{
     protected $fillable = [
      'document_name',
             'image',
              'status',
             'added_by'
    ];
}
