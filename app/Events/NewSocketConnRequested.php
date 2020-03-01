<?php

namespace App\Events;

use App\SocketChannel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSocketConnRequested implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $socketChannel;

    /**
     * Create a new event instance.
     *
     * @param \App\SocketChannel $socketChannel
     */
    public function __construct(SocketChannel $socketChannel) {
        $this->socketChannel = $socketChannel;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('simpleTransfer.'.$this->socketChannel->channel_name);
    }
}
