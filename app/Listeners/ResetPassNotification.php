<?php

namespace App\Listeners;

use App\Events\ResetPassEvent;
use App\Notifications\ResetPassNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResetPassNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ResetPassEvent  $event
     * @return void
     */
    public function handle(ResetPassEvent $event)
    {
        Notification::send($event->token,new ResetPassNotificationMail($event->token));
    }
}
