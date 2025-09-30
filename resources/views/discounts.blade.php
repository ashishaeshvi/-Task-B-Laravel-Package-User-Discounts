<h1>Discount Demo for {{ $user->name }}</h1>

<p>Original Amount: {{ $amount }}</p>
<p>Total Discount Applied: {{ $applied }}</p>
<p>Final Amount: {{ $amount - $applied }}</p>

<h2>Available Discounts:</h2>
<ul>
    @foreach($discounts as $discount)
    <li>
        {{ $discount->name }} - {{ $discount->percentage }}%
        @if($discount->isExpired())
        (Expired)
        @elseif(!$discount->active)
        (Inactive)
        @endif
    </li>
    @endforeach
</ul>