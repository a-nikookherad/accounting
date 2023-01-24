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
        "wallet_id",
        "is_treasury",
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class, "wallet_id");
    }

    public function credits()
    {
        return $this->hasMany(Credit::class, "account_id");
    }

    public function accountable()
    {
        return $this->morphTo();
    }
}
