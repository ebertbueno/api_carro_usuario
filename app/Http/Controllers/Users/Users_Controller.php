<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Users\Users_Repositorie;

class Users_Controller extends Controller
{
    public function index()
    {
        $data = Users_Repositorie::index();
        return $data;
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        return 'store';
    }

    public function edit($id, Request $request)
    {
        return 'edit';
    }

    public function destroy($id)
    {
        return 'destroy';
    }
}
