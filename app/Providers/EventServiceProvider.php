<?php

namespace App\Providers;

use App\Events\CancelOrderEvent;
use App\Events\ConfirmOrderEvent;
use App\Events\ResetPassEvent;
use App\Listeners\CancelOrderNotification;
use App\Listeners\ConfirmOrderNotification;
use App\Listeners\ResetPassNotification;
use App\Models\Order;
use App\Observers\OrderObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        CancelOrderEvent::class => [
            CancelOrderNotification::class,
        ],
        ConfirmOrderEvent::class => [
            ConfirmOrderNotification::class,
        ],
        ResetPassEvent::class => [
            ResetPassNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
    }
}
