<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course_id'];

    /**
     * relationship with Course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Polymorphic relationship with Price
     *
     * @return MorphOne
     */
    public function price(): MorphOne
    {
        return $this->morphOne(Price::class,'priceable');
    }
}
