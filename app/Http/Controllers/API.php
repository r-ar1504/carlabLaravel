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

    // $worker = DB::table('Worker')->insert([
    //   'last_name' => $req->last_name,
    //   'fireID' => $req->fireID,
    //   'email' => $req->email,
    //   'name' => $req->name,
    // ]);

      return response()->json([$data]);
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

// @require_GET
// def createOrder(request):
//     message = " "
//     pusher.trigger('orders', 'new-order', {message: "Order Arrived"})
//     return HttpResponse()
//
// @csrf_exempt
// def createWorker(request):
//     data = json.loads(request.body.decode('utf-8'))
//
//     worker = Worker(fireID = data['fireID'], name= data['name'], last_name = data['last_name'], email= data['email'], role= data['role'], status= 'off_duty', phone= data['phone'])
//
//     worker.save()
//     pusher.trigger('orders', 'new-order', {model_to_dict(worker)})
//     return HttpResponse();
//
// @csrf_exempt
// def getWorker(request):
//     data = json.loads(request.body.decode('utf-8'))
//     print data
//     worker = model_to_dict(Worker.objects.get(fireID = data['fireID']))
//     workerID = data['fireID']
//     role = worker['role']
//
//     orders = getWorkerOrders(workerID, role)
//
//     return JsonResponse({
//     'worker': worker
//     })
//
// @csrf_exempt
// def getOrders(request):
//     data = json.loads(request.body.decode('utf-8'))
//
//     orders = Order.objects.filter(worker = data['worker']).values('name', 'status', 'latitude', 'longitude', 'cat_name')
//
//     return JsonResponse({
//     'data': list(orders)
//
//     })
//
// @csrf_exempt
// def workerStatus(request):
//     data = json.loads(request.body.decode('utf-8'))
//
//     worker = model_to_dict(Worker.objects.get(fireID = data['fireID']))
//     worker_id = data['fireID']
//
//     if worker['status'] != 'on_dutty':
//         Worker.objects.filter(fireID = worker_id).update( status = 'on_dutty' )
//     else:
//         Worker.objects.filter(fireID = worker_id).update( status = 'off_dutty' )
//
//
//     new_status = model_to_dict( Worker.objects.get(fireID = data['fireID']) )
//
//     return JsonResponse({
//     'data': new_status['status']
//     })
//
// @csrf_exempt
// def doneOrder(request):
//     data = json.loads(request.body.decode('utf-8'))
//
//     order_id = data['id']
//
//     if order_id != 'terminada':
//         Order.objects.filter(id=order_id).update(status='terminada')
//     else:
//         Order.objects.filter(fireID=worker_id).update(status='off_dutty')
//
//     new_status = Order.objects.filter(id=order_id).values(status)
//     return JsonResponse({
//     'data': list(order_id)
//     })
//
// #Custom Reusable Functions<------------------------------------------------------------------------>
//
// #<!-- Fetch Orders By Worker ID -->
// def getWorkerOrders(workerID, role):
//
//     orders = model_to_dict( Order.objects.get( worker = workerID, status = "active", service = role ) )
//
//     return orders
//
// #<!-- Fetch SubCategory By Category ID -->
// def getSubCategories( category_id ):
//
//     sub_categories = model_to_dict( SubCategory.objects.get( category_id = category_id ) )
//
//     return sub_categories
//
// #<!------------------------------------------------------------------------------------------------>
