<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// /use Auth;


// Route::get('/', function () {
	
// 	Auth::loginUsingId(1);
//     return view('welcome');
// });

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get("/", "AdminController@index");

Route::post("/give/permission", "AdminController@permissions");

Route::post("revoke/permission/{id}", "AdminController@revoke");


Route::get("admin", "AdminController@index2");
Route::get("connect", "AdminController@index2");

Route::post("/revoke/userrole/{id}", "AdminController@revokeuserrole");

Route::post("/assignroletouser","AdminController@assignroletouser");

Route::get('/total', function(){
	// $user = \App\User::count();
	// //$value = Config::get('app.timezone');
	// //$v = Config::set('app.timezone', 'America/Chicago');
	// $value = Config::get('app.timezone');
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$agent1 = $_SERVER['SERVER_NAME'];
	dd($agent1);

});

Route::get('/date', function(){
	
	return view("date");
});


