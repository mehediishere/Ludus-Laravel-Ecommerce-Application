<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
    <div class="dash__pad-1">

        <span class="dash__text u-s-m-b-16">Hello, John Doe</span>
        <ul class="dash__f-list">
            <li>

                <a class="{{ request()->is('dashboard') ? 'dash-active' : '' }}" href="{{ route('user.dashboard') }}">Manage My Account</a></li>
            <li>

                <a class="{{ request()->is('profile', 'profile/edit', 'profile/password/edit') ? 'dash-active' : '' }}" href="{{ route('profile.page') }}">My Profile</a></li>
            <li>

                <a class="{{ request()->is('address', 'address/add', 'address/default', 'address/update/*') ? 'dash-active' : '' }}" href="{{ route('address.book') }}">Address Book</a></li>
            <li>

                <a class="{{ request()->is('track-order') ? 'dash-active' : '' }}" href="{{ route('track.order') }}">Track Order</a></li>
            <li>

                <a class="{{ request()->is('my-orders', 'order/*') ? 'dash-active' : '' }}" href="{{ route('all.order') }}">My Orders</a></li>
            <li>

                <a href="dash-payment-option.html">My Payment Options</a></li>
            <li>

                <a href="dash-cancellation.html">My Returns & Cancellations</a></li>
        </ul>
    </div>
</div>
<div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
    <div class="dash__pad-1">
        <ul class="dash__w-list">
            <li>
                <div class="dash__w-wrap">

                    <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>
                    @php $orderCount = \App\Models\Order::where('user_id', \Illuminate\Support\Facades\Auth::user()->email)->count(); @endphp
                    <span class="dash__w-text">{{ $orderCount }}</span>

                    <span class="dash__w-name">Orders Placed</span></div>
            </li>
            <li>
                <div class="dash__w-wrap">

                    <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                    <span class="dash__w-text">0</span>

                    <span class="dash__w-name">Cancel Orders</span></div>
            </li>
            <li>
                <div class="dash__w-wrap">

                    <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                    <span class="dash__w-text">0</span>

                    <span class="dash__w-name">Wishlist</span></div>
            </li>
        </ul>
    </div>
</div>
