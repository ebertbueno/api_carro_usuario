<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Users\Users_Repositorie;
use Illuminate\Validation\Rule;

class Users_Controller extends Controller
{
    public function index()
    {
        return Users_Repositorie::index();
    }

    public function show($id)
    {
        return Users_Repositorie::show($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'cep' => 'max:10',
            'estado' => 'max:2',
        ]);

        $data = $request->all();
        return Users_Repositorie::store($data);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cep' => 'max:10',
            'estado' => 'max:2',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        return Users_Repositorie::edit($id, $request->except(['email', 'password']));
    }

    public function dados(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'email_novo' => ['email'],
        ]);

        return Users_Repositorie::dados($request->only(['email', 'email_novo', 'password']));
    }

    public function destroy($id)
    {
        return Users_Repositorie::destroy($id);
    }

    public function users_carros()
    {
        return Users_Repositorie::users_carros();
    }
}
