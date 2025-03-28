<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $primaryKey = 'contract_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'contract_code',
        'ContractType',
        'StartDate',
        'EndDate',
        'Note',
    ];

    // Quan hệ với Employee (nếu cần)
    public function employees()
    {
        return $this->hasMany(Employee::class, 'contract_code', 'contract_code');
    }
}
