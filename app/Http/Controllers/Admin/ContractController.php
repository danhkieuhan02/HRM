<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        // Lấy danh sách hợp đồng từ cơ sở dữ liệu
        $contracts = Contract::all();

        // Trả về view với danh sách hợp đồng
        return view('admin.contract.index', compact('contracts'));
    }

    public function create()
    {
        // Trả về view tạo hợp đồng mới
        return view('admin.contract.create');
    }

    public function store(Request $request)
    {
        // Xử lý lưu hợp đồng mới vào cơ sở dữ liệu
        $validatedData = $request->validate([
            'contract_code' => 'required|string|max:20',
            'ContractType' => 'required|string|max:50',
            'StartDate' => 'required|date',
            'EndDate' => 'nullable|date|after_or_equal:StartDate',
            'Note' => 'nullable|string',
        ]);

        Contract::create($validatedData);

        return redirect()->route('admin.contracts.index')->with('success', 'Hợp đồng đã được tạo thành công.');
    }
    public function edit($id)
    {
        // Tìm hợp đồng theo ID
        $contract = Contract::findOrFail($id);

        // Trả về view chỉnh sửa hợp đồng
        return view('admin.contract.edit', compact('contract'));
    }
    public function update(Request $request, $id)
    {
        // Tìm hợp đồng theo ID
        $contract = Contract::findOrFail($id);

        // Xử lý cập nhật hợp đồng
        $validatedData = $request->validate([
            'contract_code' => 'required|string|max:20',
            'ContractType' => 'required|string|max:50',
            'StartDate' => 'required|date',
            'EndDate' => 'nullable|date|after_or_equal:StartDate',
            'Note' => 'nullable|string',
        ]);

        $contract->update($validatedData);

        return redirect()->route('admin.contracts.index')->with('success', 'Hợp đồng đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        // Tìm hợp đồng theo ID
        $contract = Contract::findOrFail($id);

        // Xóa hợp đồng
        $contract->delete();

        return redirect()->route('admin.contracts.index')->with('success', 'Hợp đồng đã được xóa thành công.');
    }
}
