<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            [
                'employee_code' => 'NV001',
                'full_name' => 'Nguyễn Văn A',
                'birthday' => '1990-05-15',
                'hometown' => 'Hà Nội',
                'image' => null,
                'gender' => 'Nam',
                'ethnic' => 'Kinh',
                'phone_number' => '0912345678',
                'status' => 'Đang làm việc',
                'department_code' => 'DP001',
                'employee_position_code' => 'POS001',
                'contract_code' => 'CT001',
                'education_level_code' => 'EDU001',
            ],
            [
                'employee_code' => 'NV002',
                'full_name' => 'Trần Thị B',
                'birthday' => '1995-08-20',
                'hometown' => 'TP.HCM',
                'image' => null,
                'gender' => 'Nữ',
                'ethnic' => 'Kinh',
                'phone_number' => '0987654321',
                'status' => 'Đang làm việc',
                'department_code' => 'DP002',
                'employee_position_code' => 'POS002',
                'contract_code' => 'CT002',
                'education_level_code' => 'EDU002',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
