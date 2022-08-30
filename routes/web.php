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
    return [
        'USERS' => [
            'get' => ['/users', '/users/{id}', '/users/carros/todos',],
            'post' => ['/users', '/users/{id}', '/users/{id}/dados',],
            'delete' => ['/users/{id}',],
        ],
        'CARROS' => [
            'get' => ['/carros', '/carros/{id}',],
            'post' => ['/carros', '/carros/{id}',],
            'delete' => ['/carros/{id}',],
        ],
    ];
});

// rota de usuários
$router->get('/users', 'Users\Users_Controller@index');
$router->get('/users/{id}', 'Users\Users_Controller@show');
$router->get('/users/carros/todos', 'Users\Users_Controller@users_carros');
$router->post('/users', 'Users\Users_Controller@store');
$router->post('/users/{id}', 'Users\Users_Controller@edit');
$router->post('/users/{id}/dados', 'Users\Users_Controller@dados');
$router->delete('/users/{id}', 'Users\Users_Controller@destroy');

// // rota de carros
$router->get('/carros', 'Carros\Carros_Controller@index');
$router->post('/carros', 'Carros\Carros_Controller@store');
$router->get('/carros/{id}', 'Carros\Carros_Controller@show');
$router->post('/carros/{id}', 'Carros\Carros_Controller@edit');
$router->delete('/carros/{id}', 'Carros\Carros_Controller@destroy');
$router->post('/carros/{users_id}/{carro_id}', 'Carros\Carros_Controller@users_carros');
