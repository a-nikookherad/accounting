<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "title_farsi",
        "is_default",
        "is_admin",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "rel_groups_users", "group_id", "user_id");
    }
}
