<?php

declare(strict_types=1);

namespace Sms\Providers;

use Illuminate\Support\ServiceProvider;
use Sms\Models\Agency;
use Sms\Models\Client;
use Sms\Models\Device;
use Sms\Models\Note;
use Sms\Models\Ticket;
use Sms\Models\User;
use Sms\Observers\AgencyObserver;
use Sms\Observers\ClientObserver;
use Sms\Observers\DeviceObserver;
use Sms\Observers\NoteObserver;
use Sms\Observers\TicketObserver;
use Sms\Observers\UserObserver;

/**
 * Class AppServiceProvider
 * @package Sms\Providers
 */
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
        Client::observe(ClientObserver::class);
        Device::observe(DeviceObserver::class);
        User::observe(UserObserver::class);
        Agency::observe(AgencyObserver::class);
        Note::observe(NoteObserver::class);
    }
}
