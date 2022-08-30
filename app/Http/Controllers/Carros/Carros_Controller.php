<?php

namespace App\Http\Controllers\Carros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Carros\Carros_Repositorie;

class Carros_Controller extends Controller
{
    public function index()
    {
        $data = Carros_Repositorie::index();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, Carros_Repositorie::validacaoCarro());
        return Carros_Repositorie::store($request->all());
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, Carros_Repositorie::validacaoCarro());
        return Carros_Repositorie::edit($id, $request->all());
    }

    public function show($id)
    {
        return Carros_Repositorie::show($id);
    }

    public function users_carros($users_id, $carro_id)
    {
        return Carros_Repositorie::users_carros($users_id, $carro_id);
    }

    public function destroy($id)
    {
        return Carros_Repositorie::destroy($id);
    }
}
