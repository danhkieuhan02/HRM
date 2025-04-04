<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        // Lấy danh sách phòng ban từ cơ sở dữ liệu
        $departments = Department::all();

        // Trả về view với danh sách phòng ban
        return view('admin.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'department_code' => 'required|string|max:20|unique:departments',
            'department_name' => 'required|string|max:50',
            'Address' => 'nullable|string',
            'PhoneNumber' => 'nullable|string|max:15'
        ]);

        Department::create($validatedData);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Thêm phòng ban thành công!');
    }
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validatedData = $request->validate([
            'department_code' => 'required|string|max:20|unique:departments,department_code,' . $id,
            'DepartmentName' => 'required|string|max:50',
            'Address' => 'nullable|string',
            'PhoneNumber' => 'nullable|string|max:15'
        ]);

        $department->update($validatedData);

        return redirect()->route('admin.department.index')
            ->with('success', 'Cập nhật phòng ban thành công!');
    }

    public function destroy($id)
    {
        // Tìm phòng ban theo ID
        $department = Department::findOrFail($id);

        // Xóa phòng ban
        $department->delete();

        return redirect()->route('admin.department.index')->with('success', 'Phòng ban đã được xóa thành công.');
    }
}
