<?php

namespace App\Console\Commands;

use App\Models\book_reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("Fine update is started!");
        DB::update('UPDATE `library_system_reservation` SET fine=DATEDIFF(CURRENT_DATE ,end_date)*5000 where DATEDIFF(CURRENT_DATE ,end_date)>0 and returned=1;');
        Log::info("Fine update is ended!");
    }
}
