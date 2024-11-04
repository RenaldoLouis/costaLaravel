<div class="account-sidebar col-lg-3">
    <h3 class="account-sidebar-title mb-3">My Account</h3>
    <ul class="account-nav">
        <li class="{{ request()->is('my-account') ? 'active' : '' }}">
            <a href="{{ route('account') }}">Account Overview</a>
        </li>
        <!-- manage address -->
        <li class="{{ request()->is('my-account/addresses') ? 'active' : '' }}">
            <a href="{{ route('addresses.index') }}">Manage Address</a>
        </li>
        <li class="{{ request()->is('my-orders') ? 'active' : '' }}">
            <a href="{{ route('users.my-orders') }}">My Orders</a>
        </li>
        <li class="{{ request()->is('my-account/address') ? 'active' : '' }}">
            <a href="">Wishlist</a>
        </li>
        @if (auth()->user()->is_affiliate)
            <li class="mt-3 {{ request()->is('affiliate.dashboard') ? 'active' : '' }}">
                <a href="{{ route('affiliate.dashboard') }}">Affiliate Dashboard</a>
            </li>
            <li class="{{ request()->is('affiliate.links') ? 'active' : '' }}">

                <a href="{{ route('affiliate.links') }}">Affiliate Links</a>
            </li>
            <li class="{{ request()->is('affiliate.clicks') ? 'active' : '' }}">
                <a href="{{ route('affiliate.clicks') }}">Affiliate Clicks</a>
            </li>
            <li class="{{ request()->is('affiliate.sales') ? 'active' : '' }}">
                <a href="{{ route('affiliate.sales') }}">Affiliate Sales</a>
            </li>
            <!-- My Transactions -->
            <li class="{{ request()->is('users.transactions') ? 'active' : '' }} mb-3">
                <a href="{{ route('users.transactions') }}">My Transactions</a>
            </li>
        @endif
        <li class="{{ request()->is('my-account/change-password') ? 'active' : '' }}">
            <a href="{{ route('account.changePassword') }}">Change Password</a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
