<?php

declare(strict_types=1);

namespace Sms\Providers;

use Illuminate\Support\ServiceProvider;
use Sms\Models\Ticket;
use Sms\Observers\TicketObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Ticket::observe(TicketObserver::class);
    }
}
