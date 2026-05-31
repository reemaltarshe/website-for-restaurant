<?php

namespace App\Events;

use App\Models\Book;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('restaurant-channel'),
        ];
    }

    public function broadcastAs()
    {
        return 'App.Events.BookingCreated';
    }
}
