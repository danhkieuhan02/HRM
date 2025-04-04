<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(RoleUserSeeder::class);
        // $this->call(ContractSeeder::class);
        // $this->call(EducationLevelSeeder::class);
        // $this->call(DepartmentSeeder::class);
        $this->call(EmployeePositionSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
