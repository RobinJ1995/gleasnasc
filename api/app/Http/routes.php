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

$app->post ('/user', 'UserController@store');
$app->get ('/user', 'UserController@show');

$app->get ('/user/{user}/device', 'DeviceController@index');
$app->post ('/user/{user}/device', 'DeviceController@store');
$app->put ('/user/{user}/device/{device}', 'DeviceController@update');
$app->get ('/device/attribute', 'DeviceController@attributes');