<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Models\Main\Config\MainUserGroup;
use App\Listeners\Admin\MainUserLoginEvent;
use App\Models\Main\Config\MainDepartamento;
use App\Observers\Main\Config\MainUserObserver;
use App\Observers\Main\Config\MainUserGroupObserver;
use App\Observers\Main\Config\MainDepartamentoObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [SendEmailVerificationNotification::class],
        Login::class => [MainUserLoginEvent::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        MainUser::observe(MainUserObserver::class);
        MainUserGroup::observe(MainUserGroupObserver::class);
        MainDepartamento::observe(MainDepartamentoObserver::class);
    }
}
