<?php

namespace Ashish\UserDiscounts\Services;

use Ashish\UserDiscounts\Models\Discount;
use Ashish\UserDiscounts\Models\UserDiscount;
use Illuminate\Support\Facades\DB;

class DiscountService
{
    public function assign($userId, $discountId)
    {
        return UserDiscount::firstOrCreate([
            'user_id' => $userId,
            'discount_id' => $discountId,
        ]);
    }

    public function revoke($userId, $discountId)
    {
        return UserDiscount::where([
            'user_id' => $userId,
            'discount_id' => $discountId
        ])->delete();
    }

    public function eligibleFor($userId)
    {
        return UserDiscount::with('discount')
            ->where('user_id', $userId)
            ->get()
            ->filter(fn($ud) => $ud->discount->active && !$ud->discount->isExpired());
    }

    public function apply($userId, $amount)
    {
        return DB::transaction(function () use ($userId, $amount) {
            $eligible = $this->eligibleFor($userId);
            $totalDiscount = 0;

            foreach ($eligible as $ud) {
                $discount = $ud->discount;
                if ($discount->usage_limit && $ud->used >= $discount->usage_limit) continue;

                $discAmount = round($amount * $discount->percentage / 100, 2);
                $totalDiscount += $discAmount;

                // Increment usage
                $ud->increment('used');
                
            }

            return min($totalDiscount, config('user-discounts.max_percentage') * $amount / 100);
        });
    }
}
