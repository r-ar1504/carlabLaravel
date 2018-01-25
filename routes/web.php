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

Route::get('/', function () {
    return view('welcome');
});

//<!--[Get Services]-->//
Route::get('/api/get_services', "API@services");


//<!--[Get Service ==> Categories]-->//
Route::get('/get_categories/{service_id}', 'API@get_categories');
