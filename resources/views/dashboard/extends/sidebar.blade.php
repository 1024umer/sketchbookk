<div class="account__left--sidebar">
    <h3 class="account__content--title mb-20">My Profile</h3>
    <ul class="account__menu">
        <li class="account__menu--list {{ Request::routeIs('user.profile') ? 'active' : '' }}"><a href="{{route('user.profile')}}">Profile</a></li>
        {{-- <li class="account__menu--list {{ Request::routeIs('user.account') ? 'active' : '' }}"><a href="{{route('user.account')}}">Dashboard</a></li> --}}
        @if (Auth::user()->role_id == 2)
            <li class="account__menu--list {{ Request::routeIs('user.artwork.list') ? 'active' : '' }}"><a href="{{route('user.artwork.list')}}">Artwork</a></li>
            <li class="account__menu--list {{ Request::routeIs('user.order.list') ? 'active' : '' }}"><a href="{{route('user.order.list')}}">Orders</a></li>
        @endif
        @if (Auth::user()->role_id == 3)
        <li class="account__menu--list"><a href="wishlist.php">Wishlist</a></li>
        @endif
        <li class="account__menu--list"><a href="{{route('logout')}}">Log Out</a></li>
    </ul>
</div>
{{-- <li><a class="{{ Request::routeIs('user.featured.videos') ? 'active' : '' }}" href="{{route('user.featured.videos','featured')}}">Featured Videos</a></li> --}}
