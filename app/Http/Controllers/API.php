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
    // $worker = DB::table('Worker')->insert([
    //   'last_name' => $req->last_name,
    //   'status' => 'off_duty',
    //   'fireID' => $req->fireID,
    //   'email' => $req->email,
    //   'phone' => $req->phone,
    //   'name' => $req->name,
    //   'role' => $req->role
    // ]);

      return response()->json([ $req->name]);

  }


  //<!--[Get Worker & Orders]-->//
  function getWorker(Request $req){

    $worker = DB::table('Worker')->where('fireID', $req->fireID)->first();

    $worker_id = $worker->fireID;
    $worker_role = $worker->role;

    // $orders = getWorkerOrders($worker_id, $worker_role);

    return response()->json(['worker' => $worker, 'orders' => "null"]);

  }

  //<!--[Change Worker Status]-->//
  function workerStatus(Request $req){
   $worker = Worker::where('id', '=', $req->fireId)->first();

   if ($worker->status != 'on_dutty') {
     $worker->status = 'on_dutty';
     $worker->save();
   }else {
     $worker->status = 'off_dutty';
     $worker->save();
   }

   return response()->json(['data' => $worker->status]);
  }

  //<!--[Create New User]-->//
  function createUser(Request $req){

    $data = $req->all();
    $test = $data['name'];

    // $worker = DB::table('Worker')->insert([
    //   'last_name' => $req->last_name,
    //   'fireID' => $req->fireID,
    //   'email' => $req->email,
    //   'name' => $req->name,
    // ]);

      return response()->json(['data' => $data, 'test' => $test]);
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
