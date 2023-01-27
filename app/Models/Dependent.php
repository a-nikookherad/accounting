<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "title_farsi",
        "description",
        "type",
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, "rel_orders_dependents", "dependent_id", "order_id");
    }
}
