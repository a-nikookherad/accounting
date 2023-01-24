<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "account_id",
        "financial_period_id",
    ];

    public function financialPeriod()
    {
        return $this->belongsTo(FinancialPeriod::class, "financial_period_id");
    }
}
