<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\Credit;
use App\Models\FinancialPeriod;
use Illuminate\Database\Eloquent\Builder;

class FinancialPeriodObserver
{
    /**
     * Handle the FinancialPeriod "created" event.
     *
     * @param \App\Models\FinancialPeriod $financialPeriod
     * @return void
     */
    public function created(FinancialPeriod $financialPeriod)
    {
        //get all credit in active wallet's account's and then update financial_period_id field
        Account::query()
            ->whereNull("financial_period_id")
            ->where("created_at",">=",$financialPeriod->started_at)
            ->where("created_at","<=",$financialPeriod->ended_at)
            ->update(["financial_period_id" => $financialPeriod->id]);
    }

    /**
     * Handle the FinancialPeriod "updated" event.
     *
     * @param \App\Models\FinancialPeriod $financialPeriod
     * @return void
     */
    public function updated(FinancialPeriod $financialPeriod)
    {
        //
    }

    /**
     * Handle the FinancialPeriod "deleted" event.
     *
     * @param \App\Models\FinancialPeriod $financialPeriod
     * @return void
     */
    public function deleted(FinancialPeriod $financialPeriod)
    {
        //
    }

    /**
     * Handle the FinancialPeriod "restored" event.
     *
     * @param \App\Models\FinancialPeriod $financialPeriod
     * @return void
     */
    public function restored(FinancialPeriod $financialPeriod)
    {
        //
    }

    /**
     * Handle the FinancialPeriod "force deleted" event.
     *
     * @param \App\Models\FinancialPeriod $financialPeriod
     * @return void
     */
    public function forceDeleted(FinancialPeriod $financialPeriod)
    {
        //
    }
}
