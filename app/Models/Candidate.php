<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    // Tên bảng trong CSDL
    protected $table = 'candidates';

    // Khóa chính
    protected $primaryKey = 'CandidateID';

    // Cho phép fillable (Mass Assignment)
    protected $fillable = [
        'FullName',
        'Email',
        'PhoneNumber',
        'CVFile',
        'PositionApplied',
        'Status',
        'JobID',
    ];
}
