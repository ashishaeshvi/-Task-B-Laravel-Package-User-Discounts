<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Ashish\UserDiscounts\Services\DiscountService;

Route::get('/',  function () {
    return view('instruction');
});


Route::get('/demo-discounts/{user?}', function ($userId = null) {
    $user = User::find($userId);

    if (!$user) {
        return "
        <h2>User not found!</h2>
        <p>Please provide a valid user ID.</p>
        <p><strong>Note:</strong> You can generate demo users by running this command:</p>
        <pre>php artisan db:seed</pre>
    ";
    }

    $service = new DiscountService();

    // Get all discounts
    $discounts = \Ashish\UserDiscounts\Models\Discount::all();

    // Assign all discounts to user (for demo)
    foreach ($discounts as $discount) {
        $service->assign($user->id, $discount->id);
    }

    // Apply discounts to a fixed amount
    $amount = 100;
    $applied = $service->apply($user->id, $amount);

    return view('discounts', compact('user', 'discounts', 'applied', 'amount'));
})->name('demo-discounts');
