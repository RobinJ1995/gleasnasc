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

$app->post ('/user/auth', 'UserController@authenticate');
$app->post ('/user', 'UserController@store');

$app->group
(
	[
		'middleware' => 'jwt',
		'namespace' => 'App\Http\Controllers'
	],
	function ($app)
	{
		$app->get ('/user', 'UserController@show');

		$app->get ('/device', 'DeviceController@index');
		$app->post ('/device', 'DeviceController@store');
		$app->put ('/device/{device}', 'DeviceController@update');
		$app->get ('/device/attribute', 'DeviceController@attributes');

		$app->get ('/device/{device}/notification/{notification}', 'NotificationController@show');
		$app->post ('/device/{device}/notification', 'NotificationController@store');
	}
);