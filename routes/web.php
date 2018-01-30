<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });

//<!--[Get Services]-->//
Route::get('get_services', "API@services");

//<!--[Get Service ==> Categories]-->//
Route::get('get_categories/{service_id}', 'API@get_categories');

//<!--[Get Worker Data]-->//
Route::get('get_worker/{fireID}', 'API@getWorker');

//<!--[Create Worker]-->//
Route::post('create_worker', 'API@createWorker');

//<!--[Create User]-->//
Route::post('create_user', 'API@createUser');

//<!--[Change Worker Status]-->//
Route::get('change_status/{fireID}', 'API@workerStatus');

//<!--[Update Worker]-->//
Route::post('update_worker/{fireID}', 'API@updateWorker');

//<!--[Get User Data]-->//
Route::get('get_user/{fireID}', 'API@getUser');

//<!--[Update user]-->//
Route::post('update_user/{fireID}', 'API@updateUser');

Route::post('create_order', 'API@createOrder');
