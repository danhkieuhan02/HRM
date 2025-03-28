<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //danh sách tài khoản
    public function index()
    {
        $users = User::all();
        return view('admin.account.accountlist', compact('users'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'IsAdmin' => 'required|boolean',
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'IsAdmin' => $request->is_admin,
        ]);

        return redirect()->back()->with('success', 'Tài khoản đã được thêm thành công!');
    }
    //chỉnh sửa tài khoản
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            "name" => "required",
            "email" => "required|email",
            "IsAdmin" => "required|boolean",
        ];
        $request->validate($rules);

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    //xoá tài khoản
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Tài khoản đã được xóa thành công!');
    }

    //Thay đổi mật khẩu
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
            "cf_password"  => "required",
        ];
        $request->validate($rules);

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if (Hash::check($data['old_password'], $user->password)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            $msg = 'Cập nhật mật khẩu thành công!';
            return redirect()->to('/')
                ->with('_success', $msg);
        } else {
            $msg = 'Mật khẩu cũ không đúng!';
            return redirect()->route('account.updatePassword')->with('_errors', $msg);
        }
    }
}
