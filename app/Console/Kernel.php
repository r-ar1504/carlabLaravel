<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Pusher\Laravel\Facades\Pusher;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function(){
        $orders = DB::table('Order')->where('status', '=', 0)->get();

        if ( count($orders) > 0) {

          foreach ($orders as $order) {
            $c_o = $order->id;
            if ($order->rejections < 2 && $order->tries < 3) {
              $closest=DB::table('OrderCandidate')->where('order_id','=',$c_o)->min('service_distance');

              $worker = DB::table('OrderCandidate')->where('worker_response', '!=', 2)->where('order_id','=',$c_o)->where('service_distance', $closest)->first();

                Pusher::trigger('worker-'.$worker->worker_id, 'new-order', ['order' => $order]);
                DB::table('Order')->where('id', $c_o)->increment('tries');

            }else{
                $message = "No hay operadores disponibles por el momento";
                Pusher::trigger('order-'.$order->id, 'no-workers', ['message' => $message] );
                 /*Delete order from DB*/

                $candidates = DB::table('OrderCandidate')->where('order_id', $order->id)->get();

                foreach ($candidates as $candidate) {
                  DB::table('OrderCandidate')->where('id', $candidate->id)->delete();
                }
                DB::table('Order')->where('id', $order->id)->delete();
            }
          }
        }else {
          echo "No Pending Orders";
        }
      })->everyMinute();

      $schedule->call(function(){
        $orders = DB::table('Order')->where('status', '=', 0)->get();

        if ( count($orders) > 0) {

          foreach ($orders as $order) {
            $c_o = $order->id;
            $workers = DB::table('Worker')->where('status', '!=', 0)->where('role', '=', $order->service_name)->get();

              // TO-DO
            foreach ($workers as $worker) {
              
              // convert from degrees to radians
              $latFrom = deg2rad($order->latitude);
              $lonFrom = deg2rad($order->longitude);
              $latTo = deg2rad($worker->latitude);
              $lonTo = deg2rad($worker->longitude);

              $latDelta = $latTo - $latFrom;
              $lonDelta = $lonTo - $lonFrom;

              $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

              $total_distance =  $angle * 6371000;

              if(DB::table('OrderCandidate')->where('worker_id', '=', $worker->fireID)->exists()){
                return response()->json(['response' => "User Exists"]);

              }else{
                $candidate = DB::table('OrderCandidate')->insertGetId([
                  'worker_id' => $worker->fireID,
                  'order_id' => $order->id,
                  'order_status' => $order->status,
                  'service_distance' => $total_distance,
                ]);
              }
            }
          }
        }
      })->everyMinute();


    }



    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
