<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        "min",
        "max",
        "from_date",
        "to_date",
        "category_id",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, "rel_budgets_products", "budget_id", "product_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
