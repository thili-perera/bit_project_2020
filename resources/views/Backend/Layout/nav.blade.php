<div class="nav_menu">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
        <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                    data-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img src="{{ url('upload/user',Auth::user()->image)}}" alt="">{{Auth::user()->fname .' '. Auth::user()->lname}}
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="">{{Auth::user()->fname .' '. Auth::user()->lname}}
                    @endif
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('dashboard.user.userprofile',Auth::user()->id)}}"> Profile</a>
                    <a class="dropdown-item" href="{{route('dashboard.logout')}}"><i
                            class="fa fa-sign-out pull-right"></i>
                        Log Out</a>
                </div>
            </li>

            <li role="presentation" class="nav-item dropdown open">
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were
                                where...
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were
                                where...
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were
                                where...
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were
                                where...
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="dropdown-item">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>