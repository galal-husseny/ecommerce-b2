<?php

namespace App\Listeners;

use App\Jobs\SendOrderMailForAdminJob;
use App\Jobs\SendOrderMailForSellersJob;
use App\Jobs\SendOrderMailForUserJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreatedListener
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
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        SendOrderMailForUserJob::dispatch();
        SendOrderMailForAdminJob::dispatch();
        SendOrderMailForSellersJob::dispatch();
    }
}
