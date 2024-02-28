<!-- start Container Wrapper -->
<div id="container-wrapper">
    <!-- Dashboard -->
    <div id="dashboard" class="dashboard-container">
        <div class="dashboard-header sticky-header">
            <div class="content-left  logo-section pull-left">
                <h1><a href="{{ url('/') }}"><img style="width: 32%" src="{{ asset('assets2/images/logo.png') }}"
                            alt=""></a></h1>
            </div>
            <div class="heaer-content-right pull-right">
                {{-- <div class="search-field">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="Search Now">
                                <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="notifyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-item">
                                <i class="far fa-envelope"></i>
                                <span class="notify">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu" aria-labelledby="notifyDropdown">
                            <h4> 3 Notifications</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment2.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment3.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="all-button">See all messages</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item">
                                <i class="far fa-bell"></i>
                                <span class="notify">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <h4> 3 Messages</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment4.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment5.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="{{ asset('assets2/images/comment6.jpg') }}" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="all-button">See all messages</a>
                        </div>
                    </div> --}}
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <div class="dropdown-item profile-sec">
                            @if (auth()->user()->image != null)
                                <img src="{{ auth()->user()->image }}" alt="">
                            @else
                                <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                    alt="">
                            @endif

                            <span>My Account </span>
                            <i class="fas fa-caret-down"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu account-menu">
                        <ul>
                            <li><a href="{{ route('password.change') }}"><i class="fas fa-user"></i>Profile</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i>Logout</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-navigation">
            <!-- Responsive Navigation Trigger -->
            <div id="dashboard-Navigation" class="slick-nav"></div>
            <div id="navigation" class="navigation-container">
                <ul>

                    @if (Auth::check() && Auth::user()->user_type == 'Admin')
                        <li class="active-menu"><a href="{{ route('admin.dashboard') }}"><i
                                    class="far fa-chart-bar"></i> Dashboard</a></li>
                        <li><a><i class="fas fa-users"></i>Users</a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.users') }}">All Users</a>
                                </li>
                            </ul>
                        </li>

                        <li><a href="{{ route('admin.trips.all') }}"><i class="fas fa-umbrella-beach"></i> Trips &
                                Plans</a></li>
                        <li><a href="{{ route('admin.reports') }}"><i class="fas fa-chart-line"></i> Reports</a></li>

                        <li><a href="{{ route('admin.complain') }}"><i class="fas fa-comments"></i> Complains</a></li>
                        <li><a href="{{ route('password.change') }}"><i class="far fa-user"></i>Profile</a></li>
                        {{-- <li><a href=""><i class="far fa-heart"></i>Wishlist</a></li> --}}
                        {{-- <li><a href=""><i class="fas fa-comments"></i>Comments</a></li> --}}
                    @endif
                    @if (Auth::check() && Auth::user()->user_type == 'Tourist')
                        <li class="active-menu"><a href="{{ route('tourist.dashboard') }}"><i
                                    class="far fa-chart-bar"></i> Dashboard</a></li>

                        <li><a href="{{ route('tourist.trips') }}"><i class="fas fa-ticket-alt"></i>My Trips</a></li>
                        <li><a href="{{ route('password.change') }}"><i class="far fa-user"></i>Profile</a></li>
                    @endif
                    @if (Auth::check() && Auth::user()->user_type == 'Driver')
                        <li><a href="{{ route('driver.dashboard') }}"><i class="far fa-chart-bar"></i>Dashbaord</a>
                        </li>
                        <li><a href="{{ route('driver.trip') }}"><i class="fas fa-ticket-alt"></i>My Rides</a></li>
                        <li><a href="{{ route('password.change') }}"><i class="far fa-user"></i>Profile</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
