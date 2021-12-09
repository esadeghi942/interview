<?php

namespace App\Console\Commands;

use App\Models\Report;
use App\Models\User;
use Illuminate\Console\Command;

class addReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inserting to report_table for weekly timeworking of users';

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
     * @return int
     */
    public function handle()
    {
        $users=User::users()->get();
        foreach ($users as $user){
            $report=new Report([
                'total'=>$user->total_weekly_time,
                'exepted'=>$user->time_weekly_working,
                'week'=>date('o-W'),
            ]);
            $user->reports()->save($report);
        }
        return Command::SUCCESS;
    }
}
