<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "title_farsi",
        "score",
    ];

    public function accouts()
    {
        return $this->hasMany(Account::class, "wallet_id");
    }
}
