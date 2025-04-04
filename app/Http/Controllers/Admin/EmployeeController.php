<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee; // Ensure the Employee model exists in this namespace
use App\Models\Department; // Ensure the Department model exists in this namespace
use App\Models\EmployeePosition; // Ensure the EmployeePosition model exists in this namespace
use App\Models\Contract; // Ensure the Contract model exists in this namespace
use App\Models\EducationLevel; // Ensure the EducationLevel model exists in this namespace

class EmployeeController extends Controller
{
    private $fields = [
        'employee_code' => 'Mã nhân viên',
        'full_name' => 'Họ và tên',
        'birthday' => 'Ngày sinh',
        'hometown' => 'Quê quán',
        'image' => 'Ảnh',
        'gender' => 'Giới tính',
        'ethnic' => 'Dân tộc',
        'phone_number' => 'Số điện thoại',
        'status' => 'Trạng thái',
        'department_code' => 'Phòng ban',
        'employee_position_code' => 'Chức vụ',
        'contract_code' => 'Hợp đồng',
        'education_level_code' => 'Trình độ học vấn',
    ];
    //view index
    public function index()
    {
        // Tìm kiếm theo tên hoặc mã nhân viên, phân trang 20 bản ghi
        $search = request()->input('search');
        if ($search) {
            // nếu toàn bộ là số thì tìm theo mã nhân viên
            if (is_numeric($search)) {
                $employees = Employee::where('employee_code', '=', $search)->paginate(20);
            } else {
                // nếu không phải số thì tìm theo tên
                $employees = Employee::where('full_name', 'like', '%' . $search . '%')->paginate(20);
            }
        } else {
            $employees = Employee::paginate(20);
        }
        // Truyền dữ liệu vào view
        return view('admin.employee.index', compact('employees'));
    }

    public function createEmployeeInfor()
    {
        return view('admin.employees.createEmployeeInfor');
    }

    // create
    public function create()
    {
        // load thêm các dropdown
        $departments = Department::all();
        $employee_positions = EmployeePosition::all();
        $contracts = Contract::all();
        $education_levels = EducationLevel::all();
        return view('admin.employee.create', compact('departments', 'employee_positions', 'contracts', 'education_levels'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|string|max:20|unique:employees,employee_code',
            'full_name' => 'required|string|max:100',
            'birthday' => 'required|date',
            'hometown' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:Male,Female,Other',
            'ethnic' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:15|regex:/^[0-9]+$/',
            'status' => 'nullable|string|max:20',
            'department_code' => 'nullable|exists:departments,department_code',
            'employee_position_code' => 'nullable|exists:employee_positions,employee_position_code',
            'contract_code' => 'nullable|exists:contracts,contract_code',
            'education_level_code' => 'nullable|exists:education_levels,education_level_code',
        ], [], $this->fields);
        $data = $request->all();
        unset($data['_token']);
        $employee = new Employee($data);
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('employee_images'), $imageName);
            $employee->image = 'employee_images/' . $imageName;
        }
        $employee->save();

        return redirect()->route('admin.employees.index')->with('success', 'Nhân viên đã được thêm thành công.');
    }

    //edit
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        // load thêm các dropdown
        $departments = Department::all();
        $employee_positions = EmployeePosition::all();
        $contracts = Contract::all();
        $education_levels = EducationLevel::all();
        return view('admin.employee.edit', compact('employee', 'departments', 'employee_positions', 'contracts', 'education_levels'));
    }
    //update
    public function update(Request $request, $id)
    {
        // findOrFail
        $employee = Employee::findOrFail($id);
        // validate
        $request->validate([
            'full_name' => 'required|string|max:100',
            'birthday' => 'required|date',
            'hometown' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:Male,Female,Other',
            'ethnic' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:15|regex:/^[0-9]+$/',
            'status' => 'nullable|string|max:20',
            'department_code' => 'nullable|exists:departments,department_code',
            'employee_position_code' => 'nullable|exists:employee_positions,employee_position_code',
            'contract_code' => 'nullable|exists:contracts,contract_code',
            'education_level_code' => 'nullable|exists:education_levels,education_level_code',
        ], [], $this->fields);

        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($employee->image && file_exists(public_path($employee->image))) {
                unlink(public_path($employee->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('employee_images'), $imageName);
            $data['image'] = 'employee_images/' . $imageName;
        } else {
            $data['image'] = $employee->image; // Keep the old image if no new one is uploaded
        }

        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('success', 'Nhân viên đã được cập nhật thành công.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $employees = Employee::query()
            ->when($search, function ($query, $search) {
                if (is_numeric($search)) {
                    $query->where('employee_code', $search);
                } else {
                    $query->where('full_name', 'like', "%{$search}%")
                        ->orWhere('employee_code', 'like', "%{$search}%");
                }
            })
            ->paginate(20);

        return view('admin.employees.index', compact('employees'));
    }
    // destroy
    public function destroy($employee_code)
    {
        $employee = Employee::where('employee_code', $employee_code)->firstOrFail();
        // Delete the image if it exists
        if ($employee->image && file_exists(public_path($employee->image))) {
            unlink(public_path($employee->image));
        }
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Nhân viên đã được xóa thành công.');
    }
}
