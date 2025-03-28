<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $primaryKey = 'education_level_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'education_level_code',
        'education_level_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'education_level_code', 'education_level_code');
    }
}
