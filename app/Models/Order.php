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
        "orderable_type",
        "orderable_id",
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, "order_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "rel_orders_products", "order_id", "product_id");
    }
}
