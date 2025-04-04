<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeePosition;

class EmployeePositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            [
                'employee_position_code' => 'POS001',
                'employee_name' => 'Nhân viên',
            ],
            [
                'employee_position_code' => 'POS002',
                'employee_name' => 'Quản lý',
            ],
            [
                'employee_position_code' => 'POS003',
                'employee_name' => 'Trưởng phòng',
            ],
        ];

        foreach ($positions as $position) {
            EmployeePosition::create($position);
        }
    }
}
