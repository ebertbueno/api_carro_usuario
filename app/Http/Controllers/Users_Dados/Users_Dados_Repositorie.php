<?php

namespace App\Http\Controllers\Users_Dados;

use Hash;

class Users_Dados_Repositorie
{
    static function index()
    {
        $data = Model('UsersDados')::get();
        return $data;
    }
}
