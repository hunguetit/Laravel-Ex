<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Products;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->call(function(){
            $current_date = date('Y-m-d');
            $timeSales = DB::table('products')
                        ->select('products.timeSale')
                        ->get();
            foreach ($timeSales as $timeSale) {
                if ($timeSale == $current_date){
                    DB::table('products')
                        ->where('products.timeSale', '=', $timeSale)
                        ->update(['sale'=>'0']);
                }
            }
        })->daily();
    }
}
