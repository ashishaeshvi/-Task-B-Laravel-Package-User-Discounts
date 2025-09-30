<?php

namespace Ashish\UserDiscounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Ashish\UserDiscounts\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        Discount::create([
            'name' => '10% Off',
            'percentage' => 10,
            'usage_limit' => 1,
            'active' => true,
        ]);

        Discount::create([
            'name' => '5% Bonus',
            'percentage' => 5,
            'usage_limit' => 2,
            'active' => true,
        ]);

        Discount::create([
            'name' => 'Expired Discount',
            'percentage' => 20,
            'usage_limit' => 1,
            'active' => true,
            'expires_at' => now()->subDays(1),
        ]);
    }
}
