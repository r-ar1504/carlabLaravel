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
  	$worker = worker::all();
  	return view('panel.list-worker')->with('workers', $worker);
  }

  public function seeOrders(){
  	return view('panel.list-order');
  }

  public function OrderStatus(Request $request){
  	if($request['status'] == 'all'){
      $order = DB::table('order')->orderBy('order.id','desc')->get();
      //$order_worker = DB::table('order')->join('worker', 'worker.ID', 'order.worker_id')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '0'){
  		$order = DB::table('order')->where('status', '=', '0')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '1'){
  		$order = DB::table('order')->where('status', '=', '1')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '4'){
  		$order = DB::table('order')->where('status', '=', '4')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else if($request['status'] == '10'){
  		$order = DB::table('order')->where('status', '=', '10')->orderBy('order.id','desc')->get();
  		return view('panel.list-order')->with('orders', $order);
  	}
  	else{
  		$order = order::all();
  		return view('panel.list-order')->with('orders', $order);
  	}
  }

  public function updateOrder(Request $request){
  	DB::table('order')->where('id', $request['id_order'])->update(['status' => $request['status']]);
  	$orders = order::all();
  	return view('panel.list-order')->with('orders', $orders);
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
