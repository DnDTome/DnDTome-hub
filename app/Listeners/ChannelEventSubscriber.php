<?php

namespace App\Listeners;

use App\Events\NewSocketConnRequested;
use App\Events\SendChannelMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChannelEventSubscriber
{
    /**
     * Handle new channel creation events.
     */
    public function handleNewChannelRequest($event) {

    }

    /**
     * Handle Send Channel Message Event.
     */
    public function handleSendChannelMessage($event) {

    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\NewSocketConnRequested',
            'App\Listeners\ChannelEventSubscriber@handleNewChannelRequest'
        );

        $events->listen(
            'Illuminate\Auth\Events\SendChannelMessage',
            'App\Listeners\ChannelEventSubscriber@handleSendChannelMessage'
        );
    }
}
