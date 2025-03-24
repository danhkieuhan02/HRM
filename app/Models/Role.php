<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Role extends Authenticatable
{
    protected $table = 'Role';        // Tên bảng
    protected $primaryKey = 'RoleID'; // Khóa chính

    protected $fillable = [
        'RoleName',
        'Description',
    ];

    // Quan hệ với User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'RoleID');
    }
}
