<?php

namespace App\Http\Controllers\Users;
use App\Helpers\Functions;

use Hash;

class Users_Repositorie
{
    public function index()
    {
        return Functions::Model('UsersDados')::first();
    }
}
