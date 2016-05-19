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


Route::get("/", "AdminController@index");

Route::post("/give/permission", "AdminController@permissions");

Route::post("revoke/permission/{id}", "AdminController@revoke");

Route::get("/connect", function(){
	Auth::loginUsingId(1);
	return view("connect");
});

Route::post("/revoke/userrole/{id}", "AdminController@revokeuserrole");

Route::post("/assignroletouser","AdminController@assignroletouser");