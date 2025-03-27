<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    //Đăng ký tài khoản
    public function register()
    {
        return view("account.register");
    }

    public function save(Request $request)
    {
        $this->customValidate($request);
        $data = $request->all();
        unset($data['_token']);
        unset($data['cf_password']);
        $data["password"] = Hash::make($data['password']);
        $data["RoleId"] = 'client';
        $user = User::create($data);
        return redirect()
            ->route('account.login')
            ->with('_success', 'Đăng ký tài khoản thành công!');
    }

    public function customValidate(Request $request)
    {
        $rules = [
            "name" => "required|min:3",
            "password" => "required|min:4|same:cf_password",
            "cf_password"  => "required",
            "email" => "required|unique:users,email"
        ];
        $request->validate($rules);
    }

    //Đăng nhập 
    public function login()
    {
        return view('account.login');
    }

    public function auth(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if (Auth::attempt($data)) {
            return redirect()->to('/')->with('_success', "Signed in system successfully!");
        } else {
            return redirect()->route('account.login')->with('_errors', "Tên đăng nhập hoặc mật khẩu không đúng!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/')
            ->with('_success', "Đăng xuất khỏi hệ thống thành công!");
    }
}
