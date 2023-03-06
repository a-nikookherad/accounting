<?php

namespace Vision\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

class Vision extends Model
{
    use HasFactory, SoftDeletes;

    const WISHLIST = "wishlist";
    const IN_PROGRESS = "in_progress";
    const DONE = "done";
    const CANCEL = "cancel";
    public static array $status = [
        self::WISHLIST => "لیست آرزوها",
        Self::IN_PROGRESS => "در حال انجام",
        self::DONE => "انجام شده",
        self::CANCEL => "کنسل شده",
    ];

    protected $fillable = [
        "title",
        "wish_title",
        "wish_amount",
        "status",
    ];

    public function plans()
    {
        return $this->hasMany(VisionPlan::class, "vision_id");
    }

    public function prices()
    {
        return $this->hasMany(VisionPrice::class, "vision_id");
    }

    public function dates()
    {
        return $this->hasMany(VisionDate::class, "vision_id");
    }

    public function attachments()
    {
        return $this->hasMany(VisionAttachment::class, "vision_id");
    }
}
