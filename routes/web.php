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

$router->get('cep/{cep}/async/json', ['uses' => 'JsonController@getLocationByCepASync']);
$router->get('cep/{cep}/async/xml', ['uses' => 'XmlController@getLocationByCepASync']);

$router->get('cep/{cep}/sync/json', ['uses' => 'JsonController@getLocationByCepSync']);
$router->get('cep/{cep}/sync/xml', ['uses' => 'XmlController@getLocationByCepSync']);
