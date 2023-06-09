<?php

namespace App\Listeners;

use App\Mail\SendOrderMailForUser;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendOrderMailForUserJob;
use App\Jobs\SendOrderMailForAdminJob;
use App\Jobs\SendOrderMailForSellersJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        SendOrderMailForUserJob::dispatch($event->user);
        SendOrderMailForAdminJob::dispatch($event->admin);
        SendOrderMailForSellersJob::dispatch($event->seller);
    }
}
