<?php

namespace App\Broadcasting;

use App\SocketChannel;
use App\User;

class SimpleTransferChannel {
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param \App\SocketChannel $socketChannel
     * @param $authKey
     * @return array|bool
     */
    public function join(SocketChannel $socketChannel, $authKey) {
        return $socketChannel->authKey = $authKey;
    }
}
