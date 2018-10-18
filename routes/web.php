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
$router->group(['prefix' => 'v1','middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('blog', 'BlogController@index');
    $router->get('blog/{id}', 'BlogController@show');
    $router->post('blog', 'BlogController@post');
    $router->put('blog/{id}', 'BlogController@update');
    $router->delete('blog/{id}', 'BlogController@delete');
});

$router->post('auth', 'Auth@authenticate');
