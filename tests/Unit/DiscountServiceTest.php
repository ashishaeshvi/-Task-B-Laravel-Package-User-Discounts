<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Ashish\UserDiscounts\Models\Discount;
use Ashish\UserDiscounts\Services\DiscountService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscountServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_discount_apply_respects_usage_cap()
    {
        $user = User::factory()->create();
        $discount = Discount::create([
            'name' => '10% off',
            'percentage' => 10,
            'usage_limit' => 1,
            'active' => true
        ]);

        $service = new DiscountService();
        $service->assign($user->id, $discount->id);

        $amount = 100;
        $first = $service->apply($user->id, $amount);
        $this->assertEquals(10, $first);

        $second = $service->apply($user->id, $amount);
        $this->assertEquals(0, $second); // usage cap enforced
    }
}
