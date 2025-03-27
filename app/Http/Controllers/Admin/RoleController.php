<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    // Danh sách tài khoản
    public function index()
    {
        $users = User::all();
        $roles = Role::all(); // Thêm danh sách vai trò
        return view('admin.account.rolelist', compact('roles'));
    }

    // Thêm tài khoản
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'IsAdmin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'IsAdmin' => $request->IsAdmin,
        ]);

        return redirect()->back()->with('success', 'Tài khoản đã được thêm thành công!');
    }

    // Thêm vai trò
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Vai trò đã được thêm thành công!');
    }

    // Cập nhật vai trò
    public function updateRole(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Vai trò đã được cập nhật!');
    }

    // Xóa vai trò
    public function destroyRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();
        return redirect()->route('admin.users.index')->with('success', 'Vai trò đã được xóa!');
    }

    // Thay đổi mật khẩu (giữ nguyên)
    public function updatePassword(Request $request)
    {
        return view('account.update_pwd');
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            "old_password" => "required",
            "new_password" => "required|min:4|same:cf_password",
            "cf_password" => "required",
        ];
        $request->validate($rules);

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if (Hash::check($data['old_password'], $user->password)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            return redirect()->to('/')->with('_success', 'Cập nhật mật khẩu thành công!');
        } else {
            return redirect()->route('account.updatePassword')->with('_errors', 'Mật khẩu cũ không đúng!');
        }
    }
}
