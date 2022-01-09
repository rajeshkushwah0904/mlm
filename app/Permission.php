<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'module_id',
        'module_name',
        'p_create',
        'p_view',
        'p_edit',
        'p_delete',
        'p_index',
        'user_id',
        'role_id',
    ];
}