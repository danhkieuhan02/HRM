<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationLevel;

class EducationLevelSeeder extends Seeder
{
    public function run()
    {
        $educationLevels = [
            [
                'education_level_code' => 'EDU001',
                'education_level_name' => 'Đại học',
            ],
            [
                'education_level_code' => 'EDU002',
                'education_level_name' => 'Cao đẳng',
            ],
            [
                'education_level_code' => 'EDU003',
                'education_level_name' => 'Trung cấp',
            ],
        ];

        foreach ($educationLevels as $level) {
            EducationLevel::create($level);
        }
    }
}
