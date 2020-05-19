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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('estate-categories','EstateCategoryController@index');
    $router->post('estate-categories','EstateCategoryController@store');
    $router->get('estate-categories/{category}','EstateCategoryController@show');
    $router->put('estate-categories/{category}','EstateCategoryController@update');
    $router->patch('estate-categories/{category}','EstateCategoryController@update');
    $router->delete('estate-categories/{category}','EstateCategoryController@destroy');
});
