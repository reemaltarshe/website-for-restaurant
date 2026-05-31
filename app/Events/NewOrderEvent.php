<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class NewOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function broadcastOn()
    {

        return new Channel('restaurant-channel');
    }

    public function broadcastAs()
    {
        return 'new-order';
    }
    public function broadcastWith()
    {
        $this->order->load('user');
        return [
            'order' => [
                'name'  => $this->order->user ? $this->order->user->name : 'عميل مجهول',
                'total' => $this->order->total_price,
            ]
        ];
    }
}
