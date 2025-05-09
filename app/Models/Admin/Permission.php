<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $guarded =[];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

    public function permissionsChildrent()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

    public function childPermissions()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }
}
