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

Route::get('/', function () { return view('home'); });

//<!--[Get Services]-->//
Route::get('get_services', "API@services");

Route::get('test', "API@testing");

/* Report Location */
Route::post('report_location', 'API@reportLocation');

/* Facebook Login */
Route::post('create_fb', 'API@createFB');

/*Evaluate ending order*/
Route::post('send_eval/{order_id}', "API@evaluateOrder");

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

//<!--[Update Worker]-->//
Route::get('logout/{fireID}', 'API@workerLogOut');

//<!--[Get User Data]-->//
Route::get('get_user/{fireID}', 'API@getUser');

//<!--[Update user]-->//
Route::post('update_user/{fireID}', 'API@updateUser');

//<!--[Create order]-->//
Route::post('create_order', 'API@createOrder');

//<!--[Terminate]-->//
Route::get('end_service/{order_id}/{now}', "API@terminateOrder");

//<!--[Start Washing]-->//
Route::get('wash_service/{order_id}/{now}', "API@startWash");

//<!--[Start Washing]-->//
Route::get('sub_service/{order_id}/{now}', "API@subcat_order");

//<!--[Start Route]-->//
Route::get('start_service/{order_id}/{now}', "API@startOrder");

//<!--[Fetch Orders By User]-->//
Route::get('get_orders/{fireID}', 'API@getOrders');

//<!--[Fetch Orders By User]-->//
Route::get('get_actives/{fireID}', 'API@getActives');

//<!--[Try To Reach Order]-->//
Route::get('challenge_order/{order_id}/{fireID}', 'API@challengeOrder');

//<!--[Reject Order]-->//
Route::get('reject_order/{order_id}/{fireID}', 'API@rejectOrder');

//<!--[Get Terms And Conditions]-->//
Route::get('terms','API@getTerms');

/* Check if user exists */
Route::get('check_email', 'API@checkEmail');
