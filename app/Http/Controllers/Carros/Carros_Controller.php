<?php

namespace App\Http\Controllers\Carros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Carros\Carros_Repositorie;

class Carros_Controller extends Controller
{
    public function index()
    {
        return 'index';
        $data = Carros_Repositorie::index();
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
