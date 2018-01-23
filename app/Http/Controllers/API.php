<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;

class API extends Controller
{
  //<!--[Get All Services]-->//
  function services(Request $req){

    $services = DB::select('select * from Service');
    return response()->json(['services' => $services]);

  }

  //<!--[Get Service ==> Categories]-->//
  function get_categories(Request $req, String $service_id){

    $subcategories = [];

    $categories = DB::table('Category');
    return response()->json(['services' => $services]);

  }




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
