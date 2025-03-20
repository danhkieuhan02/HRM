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
        $user = new User($data);
        $user->save();
        return redirect()
            ->route('admin.product.index')
            ->with('_success', 'Successful account registration!');
    }

    public function customValidate(Request $request)
    {
        $rules = [
            "name" => "required|min:4",
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
            return redirect()->route('account.login')->with('_errors', "Invalid username or password.");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/')
            ->with('_success', "Log out from the system successfully!");
    }

    //Thay đổi mật khẩu của users.
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
            $msg = 'Your password updated successfully!';
            return redirect()->to('/')
                ->with('_success', $msg);
        } else {
            $msg = 'Your old password is incorrect!';
            return redirect()->route('account.updatePassword')->with('_errors', $msg);
        }
    }
}
