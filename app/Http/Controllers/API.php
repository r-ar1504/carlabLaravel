<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;
use Pusher\Laravel\Facades\Pusher;

// $pusher = new Pusher\Pusher("1f8d9c19abfb2a61a064"."d143b896c5f8715af3c0"."457719". array('cluster' => 'us2'));


class API extends Controller
{

  //<!--[Get All Services]-->//
  function services(Request $req){

    $services = DB::select('select * from Service');
    return response()->json(['services' => $services]);
    Pusher::trigger('my-channel', 'my-event', ['message' => $message]);
  }

  //<!--[Get Service ==> Categories ==> SubCategories]-->//
  function get_categories(Request $req, $service_id){
    // return $service_id;
    $subcategories = [];

    $categories = DB::table('Category')->where('service_id', $service_id)->get();

    foreach ($categories as $category) {
      if ($category->sub_cat != 0) {

        $subc = $this->getSubCategories($category->id);
        array_push($subcategories, $subc);

      }
    }

    return response()->json(['categories' => $categories, 'sub-categories' => $subcategories]);

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

    // $orders = getWorkerOrders($worker_id, $worker_role);

    return response()->json(['worker' => $worker, 'orders' => "null"]);

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

  #Custom Reusable Functions<------------------------------------------------------------------------>

  // #<!-- Fetch Orders By Worker ID -->
  function getWorkerOrders($worker_id, $worker_role){

    $orders = DB::table('Order')->where('worker', $worker_id)->where('status','active')->where('service', $worker_role)->get();

    return $orders;
  }

  //<!--[Fetch SubCategory By Category ID]-->//
  function getSubCategories($category_id){

    $sub_cat = DB::table('SubCategory')->where('category_id', $category_id)->first();

    return $sub_cat;
  }

  #<!------------------------------------------------------------------------------------------------>

}
