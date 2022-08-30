<?php

namespace App\Helpers;

class Functions
{
    public function pegaIPUsuario()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    function Model($model)
    {
        $conexao = 'App\Models\\' . $model;
        return new $conexao();
    }

    function criaDadosEssenciais($data)
    {
        Model('Gerenciamento', 'UsersDados')::create([
            'users_id' => $data['id'],
            'nivel' => $data['nivel'],
        ]);
    }
}
