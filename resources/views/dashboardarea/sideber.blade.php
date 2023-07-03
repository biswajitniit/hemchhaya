<div class="profile-usermenu">
    <ul class="nav">
        <li @if(Request::segment(2) == 'dashboard')  class="active"  @endif >
            <a href="{{ url('/user/dashboard') }}"> <i class="fa fa-home"></i>
                MY PROFILE</a>
        </li>
        <li @if(Request::segment(1) == 'manage-addresses')  class="active"  @endif>
            <a href="{{ url('/manage-addresses') }}"> <i class="fa fa-user"></i>
                MY ADDRESS</a>
        </li>
        <li @if(Request::segment(1) == 'my-orders-history')  class="active"  @endif>
            <a href="{{ url('/my-orders-history') }}"> <i class="fa fa-flag"></i>
                MY ORDER HISTORY</a>
        </li>
        {{-- <li>
            <a href="my_wishlist.html"> <i class="fa fa-heart"></i>
                MY WISHLIST</a>
        </li>
        <li>
            <a href="delivery_location.html"> <i class="fa fa-map-pin"></i>
                My REVIEWS</a>
        </li> --}}
        <li>
            <a href="{{ url('/manage-addresses') }}"> <i class="fa fa-lock"></i>
                RESET PASSWORD</a>
        </li>
        <li>
            <a href="{{ route('user.logout') }}"> <i class="fa fa-lock"></i>
                LOGOUT</a>
        </li>
    </ul>
</div>
