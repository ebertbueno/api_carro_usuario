<?php

namespace App\Http\Controllers\Carros;

use Hash;

class Carros_Repositorie
{
    static function index()
    {
        $data = Model('Carros')::get();
        return response()->json($data, 200);
    }

    static function store($data)
    {
        $data['users_id'] = (!empty($data['users_id']) ? $data['users_id'] : 0);
        $ultimo = Model('Carros')::create($data);
        return response()->json($ultimo, 200);
    }

    static function edit($id, $data)
    {
        $data['users_id'] = (!empty($data['users_id']) ? $data['users_id'] : 0);
        $ultimo = Model('Carros')::find($id);
        $ultimo->update($data);
        return response()->json($ultimo, 200);
    }

    static function show($id)
    {
        $data = Model('Carros')::find($id);
        return response()->json($data, 200);
    }

    static function users_carros($users_id, $carros_id)
    {
        $users = Model('Users')::find($users_id);
        $carro = Model('Carros')::find($carros_id);

        if (!empty($users) && !empty($carro)) {
            if( $carro['users_id'] > 0 ){
                $carro->update(['users_id' => 0]);
            }else{
                $carro->update(['users_id' => $users_id]);
            }
            return response()->json(true, 200);
        }
        return response()->json(false, 202);
    }

    static function destroy($id)
    {
        return Model('Carros')::destroy($id);
    }

    static function validacaoCarro()
    {
        return [
            'users_id' => ['int'],
            'ativo' => ['string', 'max:1'],
            'tipo' => ['required'],
            'nome' => ['required'],
            'ano_fabricacao' => ['int', 'required'],
            'ano_veiculo' => ['int', 'required'],
            'cambio' => ['required'],
            'km' => ['required'],
            'placa' => ['required', 'max:10'],
            'cor' => ['required'],
            'carroceria' => ['required'],
            'portas' => ['int'],
            'motorizacao' => ['required'],
            'combustivel' => ['required'],
            'chassi' => ['required'],
            'renavam' => ['required'],
            'montadora' => ['required'],
            'modelo' => ['required'],
            'versao' => ['required'],
            'valor_vista' => ['required'],
            'valor_prazo' => ['required'],
            'valor_compra' => ['required'],
            'data_compra' => ['date', 'required'],
        ];
    }
}
