<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_code'; // Khóa chính là employee_code
    public $incrementing = false; // Không tự động tăng vì là string
    protected $keyType = 'string'; // Kiểu dữ liệu khóa chính là string

    protected $fillable = [
        'employee_code',
        'full_name',
        'birthday',
        'hometown',
        'image',
        'gender',
        'ethnic',
        'phone_number',
        'status',
        'department_code',
        'employee_position_code',
        'contract_code',
        'education_level_code',
    ];

    // Quan hệ với các bảng khác (nếu cần)
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'department_code');
    }

    public function position()
    {
        return $this->belongsTo(EmployeePosition::class, 'employee_position_code', 'employee_position_code');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_code', 'contract_code');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_code', 'education_level_code');
    }
}
