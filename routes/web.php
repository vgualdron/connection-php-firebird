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

//$router->get('/', ['uses' => 'ThirdController@list']);
$router->get('/', function () use ($router) {
    return $router->app->version()."X";
});
$router->group(["prefix" => "/third"], function () use($router){
	$router->get('/{year}', ['uses' => 'ThirdController@list']);
	$router->get('/{type}/{year}', ['uses' => 'ThirdController@listByType']);
});

$router->group(["prefix" => "/movement"], function () use($router){
	$router->post('/generate/{year}', ['uses' => 'MovementController@generate']);
});

?>
