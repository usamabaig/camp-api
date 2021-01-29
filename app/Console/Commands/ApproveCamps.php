<?php

namespace App\Console\Commands;

use App\Camp;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ApproveCamps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'approve:camps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will approve camps older than 2 days.';

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
        Camp::whereDate('created_at', '<=', Carbon::now()->subDays(2))->where([
            ['is_approved', '=', 0],
        ])->update(['is_approved' => 1]);

        $this->info('Camps Approved Successfully!');
    }
}
