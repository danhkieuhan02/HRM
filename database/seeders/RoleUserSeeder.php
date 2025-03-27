<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        // tạo lại dữ liệu mẫu
        $adminRole = Role::create([
            'RoleName' => 'admin',
            'Description' => 'Quản trị viên hệ thống',
        ]);

        $clientRole = Role::create([
            'RoleName' => 'client',
            'Description' => 'Người dùng thường',
        ]);

        // Tạo người dùng Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'RoleID' => $adminRole->RoleID,
            'IsAdmin' => true,
        ]);

        // Tạo người dùng Client
        User::create([
            'name' => 'Client',
            'email' => 'client@example.com',
            'password' => bcrypt('password'),
            'RoleID' => $clientRole->RoleID, // Sửa thành RoleID
            'IsAdmin' => false,
        ]);
    }
}
