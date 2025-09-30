<?php

namespace Ashish\UserDiscounts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDiscount extends Model
{
    protected $fillable = ['user_id', 'discount_id', 'used'];

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
