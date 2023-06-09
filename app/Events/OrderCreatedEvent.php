<?php

namespace App\Events;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Entities\Contracts\UserOrderMailEntityInterface;
use App\Entities\Contracts\AdminOrderMailEntityInterface;
use App\Entities\Contracts\SellerOrderMailEntityInterface;

class OrderCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public UserOrderMailEntityInterface $user,
        public AdminOrderMailEntityInterface $admin,
        public SellerOrderMailEntityInterface $seller,
    ) {
        //
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
