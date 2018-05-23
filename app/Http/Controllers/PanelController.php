<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Worker as worker;
use App\Order as order;

class PanelController extends Controller
{
  public function seeWorkers(){
  	return view('panel.list-worker');
  }

  public function WorkerStatus(Request $request){
  	if($request['status'] == 'all'){
  		$worker = worker::all();
  		return view('panel.list-worker')->with('workers', $worker);
  	}
  	else if($request['status'] == '1'){
  		$worker = worker::where('status', '=', '1')->get();
  		return view('panel.list-worker')->with('workers', $worker);
  	}
  	else{
  		$worker = worker::where('status', '=', '0')->get();
  		return view('panel.list-worker')->with('workers', $worker);
  	}
  }

  public function updateWorker(Request $request){
  	DB::table('worker')->where('id', $request['id_worker'])->update(['status' => $request['status']]);
  	//$worker = worker::all();
  	//return view('panel.list-worker')->with('msg', ['msj' => "El trabajador se actualizo con exito"], 'workers', $worker);
    return redirect('/trabajadores')->with('msg', ['msj' => "El trabajador se a actualizo con exito"]);
  }

  public function seeOrders(){
  	return view('panel.list-order');
  }

  public function OrderStatus(Request $request){
  	if($request['status'] == 'all'){
      //$order = DB::table('order')->orderBy('order.id','desc')->get();
      $order_worker = DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus", "order.latitude as lat", "order.longitude as lng")->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order_worker);
  	}
  	else if($request['status'] == '0'){
  		$order =  DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus", "order.latitude as lat", "order.longitude as lng")->where('order.status', '=', '0')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '1'){
  		$order = DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus", "order.latitude as lat", "order.longitude as lng")->where('order.status', '=', '1')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '4'){
  		$order =  DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus", "order.latitude as lat", "order.longitude as lng")->where('order.status', '=', '4')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '10'){
  		$order =  DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus", "order.latitude as lat", "order.longitude as lng")->where('order.status', '=', '10')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else{
  		$order = order::all();
  		return view('panel.list-order')->with('orders', $order);
  	}
  }

  public function updateOrder(Request $request){
  	DB::table('order')->where('id', $request['id_order'])->update(['status' => $request['status']]);
  	$orders = DB::table('order')->join('worker', 'worker.fireID', 'order.worker_id')->join('user', 'user.fireID', 'order.user_id')->select("order.id as orderid", "order.*", "worker.*", "user.*", "worker.name as nameworker", "user.last_name as userlast", "user.phone as userphone", "user.email as useremail", "order.status as orderstatus")->where('order.status', '=', '10')->orderBy('order.id','desc')->get();

  	//return view('panel.list-order')->with('orders', $orders, 'msg', ['msj' => "La orden se actualizo con exito"]);
    return redirect('/ordenes')->with('msg', ['msj' => "La orden se actualizo con exito"]);
  }

  public function Login(Request $request){
  	if($request->method() === 'GET'){
  		if(! \Auth::check()){
				return view('home');
				$this->validate($request, $rules, $messages);
  		}
  		return view('panel.list-worker');
  	}
  	$data = [
  		'email'    => $request['email'],
  		'password' => $request['password']
  	];

  	if (\Auth::attempt($data)){
  		return redirect('/');
  	}
  	return back()->with('errors', 'Verifica tu usuario y/o contraseña');
  }

  public function Logout(){
  	\Auth::logout();
    return redirect('/');
  }
}
