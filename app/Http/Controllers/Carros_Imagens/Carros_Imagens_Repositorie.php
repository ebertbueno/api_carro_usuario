<?php

namespace App\Http\Controllers\Carros_Imagens;

use Hash;

class Carros_Imagens_Repositorie
{
    static function index()
    {
        $data = Model('CarrosFotos')::get();
        return $data;
    }
}
