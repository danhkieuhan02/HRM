<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('/welcome');
    }


    public function create() {}


    public function store(Request $request)
    {
        //
    }

    public function show($id) {}

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
