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
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, "rel_budgets_categories", "budget_id", "category_id");
    }
}
