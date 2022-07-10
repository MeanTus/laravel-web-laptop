<?php

namespace App\Listeners;

use App\Events\CancelOrderEvent;
use App\Notifications\CancelOrderNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CancelOrderNotification
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
     * @param  \App\Events\CancelOrderEvent  $event
     * @return void
     */
    public function handle(CancelOrderEvent $event)
    {
        Notification::send($event->order, new CancelOrderNotificationMail($event->order));
    }
}
