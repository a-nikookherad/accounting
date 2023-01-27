<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "paid_at",
        "from_account_id",
        "treasury_account_id",
        "to_account_id",
        "amount",
        "order_id",
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
}
