<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () {
    return response()->json('Rota não encontrada', 404);
});

$router->get('/rotas', function () {
    return [
        'rotas' => [
            'GET' => [
                '/users' => 'Lista os usuários',
                '/users_dados' => 'lista os dados complementares de um determinado usuário',
                '/carros' => 'lista todos os veículos',
                '/carros/{id}' => 'lista todos os veículos de um determinado usuário',
            ],
            'POST' =>  [
                '/users' => 'grava um novo usuário',
                '/users/{id}' => 'atualiza um determinado usuário',
                '/users_dados/{id}' => 'atualiza os dados de um usuário',
                '/carros' => 'grava um novo veículo',
                '/carros/{id}' => 'atualiza um veículo existente',
                '/users_carros/{users_id}/{carro_id}' => 'associa / desasocia um veículo de um usuário',
            ],
            'DELETE' => [
                '/users' => 'remove um usuário, seus dados, e seus veículos',
                '/carros' => 'remove um determinado veículo',
                '/carros_imagens/{id}' => 'remove uma imagem de um veículo',
                '/carros_imagens/{id}/zera' => 'remove todas as imagens de um veículo',
            ],
        ],
    ];
});

// rota de usuários
$router->get('/users', 'Users\Users_Controller@index');
$router->post('/users', 'Users\Users_Controller@store');
$router->post('/users/{id}', 'Users\Users_Controller@edit');
$router->delete('/users/{id}', 'Users\Users_Controller@destroy');

// // rota de dados de usuários
$router->post('/users_dados/{id}', 'Users_Dados\Users_Dados_Controller@edit');

// // rota de carros
$router->get('/carros', 'Carros\Carros_Controller@index');
$router->post('/carros', 'Carros\Carros_Controller@store');
$router->post('/carros/{id}', 'Carros\Carros_Controller@edit');
$router->delete('/carros/{id}', 'Carros\Carros_Controller@destroy');

// // rota de imagens de carros
$router->get('/carros_imagens/{carro_id}', 'Carros_Imagens\Carros_Imagens_Controller@index');
$router->post('/carros_imagens/{carro_id}', 'Carros_Imagens\Carros_Imagens_Controller@store');
$router->delete('/carros_imagens/{id}', 'Carros_Imagens\Carros_Imagens_Controller@destroy');
$router->delete('/carros_imagens/{carro_id}/zera', 'Carros_Imagens\Carros_Imagens_Controller@zera');
$router->post('/users_carros/{users_id}/{carro_id}', 'Carros_Imagens\Carros_Imagens_Controller@associa_desasocia');