<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClearListingsCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @param $event
     * @throws \Exception
     */
    public function handle($event)
    {
        cache()->forget('categories-listings');
    }
}
