<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class EmployeePositionController extends Controller
{
    public function index()
    {
        // Lấy danh sách chức vụ từ cơ sở dữ liệu
        $positions = EmployeePosition::all();

        // Trả về view với danh sách chức vụ
        return view('admin.employeeposition.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.employeeposition.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'position_code' => 'required|string|max:20|unique:positions',
            'position_name' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        EmployeePosition::create($validatedData);

        return redirect()->route('admin.positions.index')
            ->with('success', 'Thêm chức vụ thành công!');
    }

    public function edit($id)
    {
        $position = EmployeePosition::findOrFail($id);
        return view('admin.employeeposition.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $position = EmployeePosition::findOrFail($id);

        $validatedData = $request->validate([
            'position_code' => 'required|string|max:20|unique:positions,position_code,' . $id,
            'position_name' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        $position->update($validatedData);

        return redirect()->route('admin.positions.index')
            ->with('success', 'Cập nhật chức vụ thành công!');
    }
}
