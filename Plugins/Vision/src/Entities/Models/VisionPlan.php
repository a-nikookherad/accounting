<?php

namespace Vision\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisionPlan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "order",
        "is_done",
        "vision_id",
    ];

    public function vision()
    {
        return $this->belongsTo(Vision::class, "vision_id");
    }
}
