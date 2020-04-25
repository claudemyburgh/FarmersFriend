<?php

namespace App\Console\Commands;

use App\Listing;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ListingExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listing:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make listing a expired.';

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
        $listing = Listing::where('expire_at', '<', Carbon::now())->update([
            'live' => null,
            'deleted_at' => Carbon::now()
        ]);

        Log::info('Cron done');

    }
}
