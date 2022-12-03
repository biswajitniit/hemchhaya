<div class="profile-usermenu">
    <ul class="nav">
        <li class="active">
            <a href="address.html"> <i class="fa fa-home"></i>
                MY PROFILE</a>
        </li>
        <li>
            <a href="{{ url('/manage-addresses') }}"> <i class="fa fa-user"></i>
                MY ADDRESS</a>
        </li>
        <li>
            <a href="order_history.html"> <i class="fa fa-flag"></i>
                MY ORDER HISTORY</a>
        </li>
        <li>
            <a href="my_wishlist.html"> <i class="fa fa-heart"></i>
                MY WISHLIST</a>
        </li>
        <li>
            <a href="delivery_location.html"> <i class="fa fa-map-pin"></i>
                My REVIEWS</a>
        </li>
        <li>
            <a href="password.html"> <i class="fa fa-lock"></i>
                RESET PASSWORD</a>
        </li>
        <li>
            <a href="{{ route('user.logout') }}"> <i class="fa fa-lock"></i>
                LOGOUT</a>
        </li>
    </ul>
</div>
