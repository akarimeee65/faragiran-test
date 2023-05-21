<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * relationship with Lesson
     *
     * @return HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
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
