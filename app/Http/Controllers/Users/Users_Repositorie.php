<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Hash;

class Users_Repositorie
{
    static function index()
    {
        return Model('Users')::get();
    }

    static function show($id)
    {
        return Model('Users')::with(['quaisDados', 'retornaCarros'])->find($id);
    }

    static function users_carros()
    {
        return Model('Users')::with(['quaisDados', 'retornaCarros'])->get();
    }

    static function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $ultimo = Model('Users')::create($data);
        $ultimo['quaisDados'] = Model('UsersDados')::where('users_id', $ultimo['id'])->first();
        $ultimo['quaisDados']->update($data);

        return response()->json($ultimo, 200);
    }

    static function edit($id, $data)
    {
        $ultimo = Model('Users')::find($id);
        $ultimo->update($data);
        $ultimo['quaisDados'] = Model('UsersDados')::where('users_id', $ultimo['id'])->first();
        $ultimo['quaisDados']->update($data);

        return response()->json($ultimo, 200);
    }

    static function dados($data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $ultimo = Model('Users')::where('email', $data['email'])->first();

        if (!empty($data['email_novo'])) {
            $ultimo->update(['email' => $data['email_novo']]);
        }

        if (!empty($data['password'])) {
            $ultimo->update(['password' => Hash::make($data['password'])]);
        }
        return response()->json($ultimo, 200);
    }

    static function destroy($id)
    {
        $ultimo = Model('Users')::find($id);
        if (!empty($ultimo)) {
            $ultimo->delete();
            Model('UsersDados')::where('users_id', $id)->delete();
            Model('Carros')::where('users_id', $id)->delete();
        }

        return response()->json(true, 200);
    }
}
