<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'department_code',
        'department_name',
    ];
}
