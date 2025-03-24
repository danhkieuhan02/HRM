<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'RoleID', // Sửa thành RoleID
        'IsAdmin', // Thêm IsAdmin nếu đã có cột này
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Quan hệ với Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'RoleID', 'RoleID'); // Sửa thành RoleID
    }

    // Kiểm tra vai trò
    public function isAdmin()
    {
        return $this->IsAdmin; // Dùng IsAdmin thay vì kiểm tra RoleName
    }
}
