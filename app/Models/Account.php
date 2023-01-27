<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "accountable_type",
        "accountable_id",
        "amount",
        "financial_period_id",
    ];

    public function accountable()
    {
        return $this->morphTo();
    }
}
