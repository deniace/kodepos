<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/a', function () use ($router) {
    return "ini dari post";
});


$router->get('hello', function () {
    return "aaa";
});

// $router->get('provinsi', 'ProvinsiController@getAllProvinsi');
// $router->get('provinsi/{id}', 'ProvinsiController@test');
// $router->get('provinsi', 'ProvinsiController@cobaDbBuilder');
// $router->get('coba', 'ProvinsiController@coba');

$router->group(['prefix' => 'provinsi'], function () use ($router) {
    // $router->get('/', 'ProvinsiController@cobaGetGroup');
    $router->get('/', 'ProvinsiController@getAllProvinsiM');
    $router->get('/{id}', 'ProvinsiController@getProvinsi');
    $router->post('/', 'ProvinsiController@cobaPostGroup');
    $router->put('/', 'ProvinsiController@cobaMethod');
    $router->delete('/', 'ProvinsiController@cobaDeleteGroup');
});

// $router->get('tj', DeniController::class);
$router->get('tj', 'DeniController@index');

$router->group(['prefix' => 'test', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'TestController@getAllTest');
    $router->get('/{id}', 'TestController@getTestById');
    $router->post('/', 'TestController@insertTest');
    $router->put('/{id}', 'TestController@updateTest');
    $router->delete('/{id}', 'TestController@deleteTest');
});
