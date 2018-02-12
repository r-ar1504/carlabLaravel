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
        // $schedule->command('inspire')
        //          ->hourly();
    }

    protected function pushUnassignedOrders(Schedule $schedule)
    {
      $schedule->call(function(){
        $orders = DB::table('Order')->where('status', '=', 0)->get();

        if ( count($orders) > 0) {

          foreach ($orders as $order) {
            $worker_list = DB::table('Worker')->where('status', 1)->where('role', $order->service_name)->get();
            DB::table('Order')->where('id', '=' $order->id)->update(['status'=> "2"]);

            if (count($worker_list)>0) {
              foreach ($worker_list as $worker) {
                Pusher::trigger("worker-".$worker->fireID, "new-order", ['order' => $order]);
              }
            }else{
              echo "No Workers";
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
