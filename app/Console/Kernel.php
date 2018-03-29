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
            if (DB::table('OrderCandidate')->where('order_id','=',$c_o)->where('worker_response','=',0)->count() < 3) {
              $min_distance =DB::table('OrderCandidate')->where('order_id','=',$order->id)->min('service_distance');

              $closest = DB::table('OrderCandidate')->where('order_id','=',$order->id)->where('service_distance', $min_distance)->first();
              Pusher::trigger("worker-".$order->worker_id, "new-order", ['order' => $order]);

            }
          }
        }else {
          echo "No Pending Orders";
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
