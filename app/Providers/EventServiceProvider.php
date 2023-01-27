<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\FinancialPeriod;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use App\Observers\AccountObserver;
use App\Observers\FinancialPeriodObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
use App\Observers\WalletObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //submit observer
        $this->submitObserver();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }

    private function submitObserver()
    {
        //submit User observer
        User::observe(UserObserver::class);

        //submit User observer
        Product::observe(ProductObserver::class);

        //submit FinancialPeriod observer
        FinancialPeriod::observe(FinancialPeriodObserver::class);
    }
}
