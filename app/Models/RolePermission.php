<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
   protected $table='role_permission';

    protected $fillable=[
        'user_id',
        'role_id',
        'permission_id'
    ];

    public $timestamps = false;
}