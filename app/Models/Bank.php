<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "card_number",
        "account_number",
    ];

    public function accounts()
    {
        return $this->morphMany(Account::class, "accountable");
    }
}
