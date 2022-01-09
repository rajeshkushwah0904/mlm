<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulePermission extends Model
{
    protected $fillable = [
        'display_name',
        'route_name',
        'role_id',
        'status',
    ];

}