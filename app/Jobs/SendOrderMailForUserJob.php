<?php

namespace App\Jobs;

use App\Entities\Contracts\UserOrderMailEntityInterface;
use Illuminate\Bus\Queueable;
use App\Mail\SendOrderMailForUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendOrderMailForUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public UserOrderMailEntityInterface $userMailData)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->userMailData->getUserEmail())->send(new SendOrderMailForUser($this->userMailData));
    }
}
