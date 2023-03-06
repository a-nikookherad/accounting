<?php

namespace Vision\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisionDate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "type",
        "will_achieve_at",
        "is_active",
        "vision_id",
    ];

    public function vision()
    {
        return $this->belongsTo(Vision::class);
    }
}
