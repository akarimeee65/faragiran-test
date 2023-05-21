<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['price'];

    /**
     * Polymorphic relationship
     *
     * @return MorphTo
     */
    public function priceable(): MorphTo
    {
        return $this->morphTo();
    }
}
