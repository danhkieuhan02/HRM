<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'department_code' => 'DP001',
            'DepartmentName' => 'Phòng Nhân sự',
        ]);
        Department::create([
            'department_code' => 'DP002',
            'DepartmentName' => 'Phòng Kỹ thuật',
        ]);
    }
}
// 