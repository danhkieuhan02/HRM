<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee; // Ensure the Employee model exists in this namespace

class EmployeeController extends Controller
{
    //view index
    public function index()
    {
        $employees = Employee::all(); // Lấy tất cả nhân viên
        return view('admin.employee.index', compact('employees'));
    }

    public function createEmployeeInfor()
    {
        return view('admin.employees.createEmployeeInfor');
    }
}
