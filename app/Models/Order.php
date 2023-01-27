<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "status",
        "description",
        "orderable_type",
        "orderable_id",
        "user_id",
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, "order_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "rel_orders_products", "order_id", "product_id");
    }

    public function dependents()
    {
        return $this->belongsToMany(Dependent::class, "rel_orders_dependents", "order_id", "dependent_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
