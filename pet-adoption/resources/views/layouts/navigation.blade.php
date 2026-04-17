
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
        {{ __('Products') }}
    </x-nav-link>

    <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
        {{ __('Customers') }}
    </x-nav-link>

    <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')">
        {{ __('Orders') }}
    </x-nav-link>

    @if(auth()->user()->is_admin)
        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
            {{ __('Manage Users') }}
        </x-nav-link>
    @endif

   
    <form method="POST" action="{{ route('logout') }}" class="inline-flex items-center ml-4">
        @csrf
        <button type="submit" 
                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out"
                onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>
</div>