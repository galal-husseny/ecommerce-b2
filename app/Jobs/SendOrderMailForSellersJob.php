<?php

namespace App\Jobs;

use App\Entities\Contracts\SellerOrderMailEntityInterface;
use App\Mail\SendOrderMailForSellers;
use App\Models\Seller;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendOrderMailForSellersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public SellerOrderMailEntityInterface $sellerMailData)
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->sellerMailData->getSellers() as $seller) {
            Mail::to($seller->getSellerEmail())->send(new SendOrderMailForSellers($this->sellerMailData));
        }
    }
}
