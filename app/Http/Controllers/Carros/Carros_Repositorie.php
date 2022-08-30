<?php

namespace App\Http\Controllers\Carros;

use Hash;

class Carros_Repositorie
{
    static function index()
    {
        $data = Model('Carros')::get();
        return $data;
    }
}
