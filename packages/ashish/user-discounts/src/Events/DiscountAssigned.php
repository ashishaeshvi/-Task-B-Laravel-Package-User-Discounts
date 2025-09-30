<?php
namespace Ashish\UserDiscounts\Events;

use Ashish\UserDiscounts\Models\UserDiscount;
use Illuminate\Foundation\Events\Dispatchable;

class DiscountAssigned
{
    use Dispatchable;

    public $userDiscount;

    public function __construct(UserDiscount $userDiscount)
    {
        $this->userDiscount = $userDiscount;
    }
}
