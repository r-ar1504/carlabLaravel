<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;
use Pusher\Laravel\Facades\Pusher;

class API extends Controller
{
  //<!--[Get All Services]-->//
  function services(Request $req){

    $services = DB::select('select * from Service');

      return response()->json(['services' => $services]);
  }

  //<!--[Get Service ==> Categories ==> SubCategories]-->//
  function get_categories(Request $req, $service_id){

    // return $service_id;
    $subcategories = [];

    $categories = (DB::table('Category')->where('service_id', $service_id)->get());

    foreach ($categories as $category) {
      if ($category->sub_cat != 0) {
        $category->sub_category = $this->getSubCategories($category->id);
      }
    }

    return response()->json(['categories' => $categories]);

  }

  //<!--[Create New Worker]-->//
  function createWorker(Request $req){

    $data = $req->all();

    $worker = DB::table('Worker')->insert([

      'last_name' => $data['last_name'],
      'status' => '0',
      'fireID' => $data['fireID'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'name' => $data['name'],
      'role' => $data['role']

    ]);

      return response()->json(['status' => '200']);

  }

  //<!--[Get Worker & Orders]-->//
  function getWorker(Request $req){

    $worker = DB::table('Worker')->where('fireID', $req->fireID)->first();

    $worker_id = $worker->fireID;
    $worker_role = $worker->role;

    $orders = $this->getWorkerOrders($worker_id, $worker_role);

    return response()->json(['worker' => $worker, 'orders' => $orders]);

  }

  //<!--[Get User]-->//
  function getUser(Request $req, $fireID){
    $user = DB::table('User')->where('fireID', $req->fireID)->first();

    $user_id = $user->fireID;

    // $orders = getWorkerOrders($worker_id, $worker_role);

    return response()->json(['user' => $user]);

  }

  //<!--[Change Worker Status]-->//
  function workerStatus(Request $req, $fireID){
   $worker = DB::table('Worker')->where('fireID', $fireID)->first();

   if ($worker->status != '0') {
     DB::table('Worker')->where('fireID', $fireID)->update(['status' => '0']);
   }else {
     DB::table('Worker')->where('fireID', $fireID)->update(['status' => '1']);
   }

    $nworker = DB::table('Worker')->where('fireID', $fireID)->first();
   return response()->json(['data' => $nworker->status]);
  }

  //<!--[Change Worker (LogOut)]-->//
  function workerLogOut(Request $req, $fireID){
   $worker = DB::table('Worker')->where('fireID', $fireID)->first();

   if ($worker->status != '0') {
     DB::table('Worker')->where('fireID', $fireID)->update(['status' => '0']);
     $nworker = DB::table('Worker')->where('fireID', $fireID)->first();
    return response()->json(['data' => $nworker->status]);
  }else {
     $nworker = DB::table('Worker')->where('fireID', $fireID)->first();
     return response()->json(['data' => $nworker->status]);
   }

  }

  //<!--[Create New User]-->//
  function createUser(Request $req){
    $data = $req->all();

    $worker = DB::table('User')->insert([
      'last_name' => $data['last_name'],
      'fireID' => $data['fireID'],
      'email' => $data['email'],
      'name' => $data['name'],
    ]);

      return response()->json(['data' => "OK", 'status' => "200"]);

  }

  //<!--[Change User Data]-->//
  function updateUser(Request $req, $fireID){

    $data = $req->all();

    $user = DB::table('User')->where('fireID',$fireID)->update(['email'=> $data['email'],
    'phone' => $data['phone']]);

    return response()->json(['status' => '200']);
  }

  //<!--[Change Worker Status]-->//
  function updateWorker(Request $req, $fireID){

    $data = $req->all();

    $worker = DB::table('Worker')->where('fireID',$fireID)->update(['email'=> $data['email'],
    'phone' => $data['phone']]);

    return response()->json(['status' => '200']);
  }

  //<!--[Create Order]-->//
  function createOrder(Request $req){
    $data = $req->all();

    $worker_list = $this->findWorker($data['service_name']);

    if ( count($worker_list)>0) {

      if($data['has_sub']!= true){
        //Register unasigned Order.
        $order_id = DB::table('Order')->insertGetId([
          'status' => $data['status'],
          'latitude' => $data['lat'],
          'longitude' => $data['lng'],
          'ammount' => $data['ammount'],
          'car_plate' => $data['car_plate'],
          'user_id' => $data['user'],
          'service_name' => $data['service_name'],
          'details' => $data['details'],
          'service_date' => $data['date'],
          'category_id' => $data['category_id'],
          'token' => $data['token']
        ]);
      }else{
        //Register unasigned Order + SubCat.
        $order_id = DB::table('Order')->insertGetId([
          'status' => $data['status'],
          'latitude' => $data['lat'],
          'longitude' => $data['lng'],
          'ammount' => $data['ammount'],
          'car_plate' => $data['car_plate'],
          'user_id' => $data['user'],
          'service_name' => $data['service_name'],
          'details' => $data['details'],
          'service_date' => $data['date'],
          'category_id' => $data['category_id'],
          'has_sub' => $data['has_sub'],
          'subcat_name' => $data['subcat_name'],
          'subcat_id' => $data['subcat_id'],
          'token' => $data['token']
        ]);
      }
      //Register unasigned Order.
      // $order_id = DB::table('Order')->insertGetId([
      //   'status' => $data['status'],
      //   'latitude' => $data['lat'],
      //   'longitude' => $data['lng'],
      //   'ammount' => $data['ammount'],
      //   'car_plate' => $data['car_plate'],
      //   'user_id' => $data['user'],
      //   'service_name' => $data['service_name'],
      //   'details' => $data['details'],
      //   'service_date' => $data['date'],
      //   'category_id' => $data['category_id'],
      //   'token' => $data['token']
      // ]);

      $order_data = $this->getOrderDetails($order_id);

      foreach ($worker_list as $worker) {

        Pusher::trigger("worker-".$worker->fireID, "new-order", ['order' => $order_data]);

      }

      return response()->json(['status' => '200', 'order_id' => $order_id, 'workers' => $worker_list, 'count' => count($worker_list)]);

    }else{

      return response()->json(['status' => '200', 'order_id' => "0", 'workers' => "no_workers"]);

    }


    //
    //
    // // Pusher::trigger('new-orders', 'new-order',  ['order_object' => $data]);
    // if ($worker->isEmpty()) {


    // }else {
    //   //Register unasigned Order.
    //   $order_id = DB::table('Order')->insertGetId([
    //     'status' => $data['status'],
    //     'latitude' => $data['lat'],
    //     'longitude' => $data['lng'],
    //     'ammount' => $data['ammount'],
    //     'car_plate' => $data['car_plate'],
    //     'user_id' => $data['user'],
    //     'service_name' => $data['service_name'],
    //     'details' => $data['details'],
    //     'service_date' => $data['date'],
    //     'category_id' => $data['category_id']
    //   ]);
    //
    //   $order = $this->getOrderDetails($order_id);


    }

  //<!--[Challenge Order]-->//
  function challengeOrder(Request $req, $order_id, $fireID){
    require_once(app_path()."/conekta-php/lib/Conekta.php");
    \Conekta\Conekta::setApiKey("key_ZuD84FNriznv8HHDPzCCoQ");
    \Conekta\Conekta::setApiVersion("2.0.0");
    $data = $req->all();

    $order = DB::table('Order')->where('id', $order_id)->first();
    $worker = DB::table('Worker')->where('fireID', $fireID)->first();
    if ($order->status != 0) {
      return response()->json(['code' => '2']);
    }elseif ($order->status == 0) {

      $user = DB::table('User')->where('fireID', '=', $order->user_id)->first();

      // Create Customer Conekta
      try {
        $customer = \Conekta\Customer::create(
          array(
            "name" => $user->name." ".$user->last_name,
            "email"=> $user->email,
            "phone"=> $user->phone,
            "payment_sources"=> array(
              array(
                "type" => "card",
                "token_id" => $order->token
              )//Payment Sources
            )//Card Data
          )//Customer Array
        );//Conekta Customer
      } catch (\Conekta\ProccessingError $error){
        echo $error->getMesage();
        Pusher::trigger('order-'.$order->id, 'info-error', ['error' => error]);
              return response()->json(['code' => '2']);
      } catch (\Conekta\ParameterValidationError $error){
        echo $error->getMessage();
        Pusher::trigger('order-'.$order->id, 'info-error', ['error' => error]);
              return response()->json(['code' => '2']);
      } catch (\Conekta\Handler $error){
        echo $error->getMessage();
        Pusher::trigger('order-'.$order->id, 'info-error', ['error' => error]);
              return response()->json(['code' => '2']);
      }

      if ($order->has_sub != "true") {
        $subcategory = DB::table('SubCategory')->where('id', '=', $order->subcat_id)->first();
        $category = DB::table('Category')->where('id', '=', $order->category_id)->first();

        try{
          $order = \Conekta\Order::create(
            array(
              "line_items" => array(
                array(
                  "name" => $order->service_name." ".$category->name,
                  "unit_price" => $category->price,
                  "quantity" => 1
                ),
                array(
                  "name" => $subcategory->name,
                  "unit_price" => $category->price,
                  "quantity" => 1
                )
              ), //line_items
              "currency" => "MXN",
              "customer_info" => array(
                "customer_id" => $customer
              ), //customer_info
              "charges" => array(
                  array(
                      "payment_method" => array(
                              "type" => "default"
                  ) //first charge
              ) //charges
            )//order
          )
        );
        } catch (\Conekta\ProcessingError $error){
          echo $error->getMesage();
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        } catch (\Conekta\ParameterValidationError $error){
          echo $error->getMessage();
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        } catch (\Conekta\Handler $error){
          echo $error->getMessage()
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        }

        DB::table('Order')->where('id', $order_id)->update(['worker_id'=> $fireID,
        'status' => 1]);

      }else {
        $category = DB::table('Category')->where('id', '=', $order->category_id)->first();

        try{
          $conekta_order = \Conekta\Order::create(
            array(
              "line_items" => array(
                array(
                  "name" => $order->service_name." ".$category->name,
                  "unit_price" => $category->price,
                  "quantity" => 1
                )
              ), //line_items
              "currency" => "MXN",
              "customer_info" => array(
                "customer_id" => $customer
              ), //customer_info
              "charges" => array(
                  array(
                      "payment_method" => array(
                              "type" => "default"
                  ) //first charge
              ) //charges
            )//order
          )
        );
        } catch (\Conekta\ProcessingError $error){
          echo $error->getMesage();
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        } catch (\Conekta\ParameterValidationError $error){
          echo $error->getMessage();
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        } catch (\Conekta\Handler $error){
          echo $error->getMessage();
          Pusher::trigger('order-'.$order->id, 'payment-error', ['error' => error]);
          return response()->json(['code' => '2']);
        }


        DB::table('Order')->where('id', $order_id)->update(['worker_id'=> $fireID,
        'status' => 1]);
      }

      Pusher::trigger('order-'.$order->id, 'got-worker', ['order' => $order]);

        return response()->json(['code' => '1']);
    }

  }

  //<!--[Fetch Orders]-->//
  function getOrders(Request $req, $fireID){
    $orders = DB::table('Order')->where('user_id', $fireID)->where('status','=', 4)->get();
    if (count($orders)>0) {
      return response()->json(['orders' => $orders, 'code' => "200"]);
    }else{
      return response()->json(['orders' => $orders, 'code' => "0"]);
    }
  }

  //<!--[Terminate Order]-->//
  function terminateOrder(Request $req, $order_id, $now){
    DB::table('Order')->where('id', $order_id)->update(['status'=> "4", 'end_date' => $now]);
    Pusher::trigger('order-'.$order_id, 'order-done', ['message' => "Order Done"]);
    return response()->json(['result' => "ok", 'code' => "200"]);
  }

  //<!--[Start Order]-->//
  function startOrder(Request $req, $order_id, $now){
    DB::table('Order')->where('id', $order_id)->update(['status'=> "2", 'starting_date' => $now]);
    Pusher::trigger('order-'.$order_id, 'route-started', ['message' => "Operador en camino"]);
    return response()->json(['result' => "ok", 'code' => "200"]);
  }

  //<!--[Wash Order]-->//
  function startWash(Request $req, $order_id, $now){
    DB::table('Order')->where('id', $order_id)->update(['status'=> "3", 'cleaning_date' => $now]);
    Pusher::trigger('order-'.$order_id, 'wash-started', ['message' => "Lavado iniciado"]);
    return response()->json(['result' => "ok", 'code' => "200"]);
  }


  #Custom Reusable Functions<------------------------------------------------------->

  // #<!-- Fetch Orders By Worker ID -->
  function getWorkerOrders($worker_id, $worker_role){

    $orders = DB::table('Order')->where('worker_id', $worker_id)->where('service_name', $worker_role)->where('status', '<', 4)->get();

    return $orders;
  }

  // #<!-- Fetch Orders By ID -->
  function getOrderDetails($order_id){

    $order = DB::table('Order')->where('id', $order_id)->first();

    return $order;
  }

  // #<!-- Fetch Workers By Status -->
  function findWorker($order_data){

    $worker_list = DB::table('Worker')->where('status', 1)->where('role', $order_data)->get();
    return $worker_list;
  }

  //<!--[Fetch SubCategory By Category ID]-->//
  function getSubCategories($category_id){

    $sub_cat = DB::table('SubCategory')->where('category_id', $category_id)->first();

    return $sub_cat;
  }

  #<!------------------------------------------------------------------------------>

  function getTerms(){
    return view('terms');
  }
}
