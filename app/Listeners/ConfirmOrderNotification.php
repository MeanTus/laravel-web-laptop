<?php

namespace App\Listeners;

use App\Events\ConfirmOrderEvent;
use App\Notifications\ConfirmOrderNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ConfirmOrderNotification
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
     * @param  \App\Events\ConfirmOrderEvent  $event
     * @return void
     */
    public function handle(ConfirmOrderEvent $event)
    {
        Notification::send($event->order, new ConfirmOrderNotificationMail($event->order));
    }
}
