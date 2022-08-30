<?php

namespace App\Http\Controllers\Carros_Imagens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Carros_Imagens\Carros_Imagens_Repositorie;

class Carros_Imagens_Controller extends Controller
{
    public function index()
    {
        return 'index';
        $data = Carros_Imagens_Repositorie::index();
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

    public function zera($carro_id)
    {
        return 'zera';
    }

    public function associa_desasocia($users_id, $carro_id)
    {
        return 'associa_desasocia';
    }
}
