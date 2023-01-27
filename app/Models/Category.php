<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "title_farsi",
        "parent_id",
        "user_id",
        "is_endpoint",
        "is_entrypoint",
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, "id");
    }

    public function children()
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "rel_categories_products", "category_id", "product_id");
    }

    public function budgets()
    {
        return $this->belongsToMany(Budget::class, "rel_budgets_categories", "category_id", "budget_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
