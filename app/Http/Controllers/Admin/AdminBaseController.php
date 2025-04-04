<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{
    //

    // Hàm này có thể được sử dụng để xử lý các yêu cầu chung cho tất cả các controller trong admin
    // Ví dụ: kiểm tra quyền truy cập, xác thực người dùng, v.v.
    public function __construct()
    {
        // Middleware hoặc các xử lý khác có thể được thêm vào đây
        // Ví dụ: $this->middleware('auth');
    }

    // trang dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
