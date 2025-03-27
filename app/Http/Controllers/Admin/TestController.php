<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends AdminBaseController
{
    // index method
    public function index()
    {
        return view('admin.test.index');
    }

    public function role()
    {
        return view('admin.test.role');
    }
}
