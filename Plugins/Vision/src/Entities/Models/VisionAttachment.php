<?php

namespace Vision\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        "src",
        "title",
        "description",
        "order",
        "is_active",
    ];

    public function vision()
    {
        return $this->belongsTo(Vision::class, "vision_id");
    }
}
