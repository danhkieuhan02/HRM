<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    protected $primaryKey = 'employee_position_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'employee_position_code',
        'employee_name',
    ];

    // Quan hệ với Employee (nếu cần)
    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_position_code', 'employee_position_code');
    }
}
