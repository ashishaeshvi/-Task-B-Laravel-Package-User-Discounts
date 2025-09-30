<?php

namespace Ashish\UserDiscounts\Events;


use Ashish\UserDiscounts\Models\UserDiscount;
use Illuminate\Foundation\Events\Dispatchable;

class DiscountApplied
{
    use Dispatchable;

    public $userDiscount;

    public function __construct(UserDiscount $userDiscount)
    {
        $this->userDiscount = $userDiscount;
    }
}
