<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\FinancialPeriod;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        //get active financial period
        $financialPeriodInstance = FinancialPeriod::query()
            ->where("is_active", true)
            ->first();

        //create default account for user
        $accountInstance = new Account();
        $accountInstance->amount = 0;
        $accountInstance->financial_period_id = $financialPeriodInstance->id;

        $user->accounts()->save($accountInstance);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
