<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopupBanner extends Model
{
     protected $fillable = [
      'popup_name',
             'image',
              'status',
             'added_by'
    ];
}
