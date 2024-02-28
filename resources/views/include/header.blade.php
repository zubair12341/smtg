<header id="masthead" class="site-header header-primary">
    <!-- header html start -->
    <div class="top-header">
       <div class="container">
          <div class="row">
             <div class="col-lg-8 d-none d-lg-block">
                <div class="header-contact-info">
                   <ul>
                      <li>
                         <a href="#"><i class="fas fa-phone-alt"></i> +92 (111) 1111 11</a>
                      </li>
                      <li>
                         <a href="mailto:info@Travel.com"><i class="fas fa-envelope"></i> iqra@iqra.edu.pk</a>
                      </li>
                      <li>
                         <i class="fas fa-map-marker-alt"></i> Iqra University North Campus
                      </li>
                   </ul>
                </div>
             </div>
             <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                <div class="header-social social-links">
                   <ul>
                      <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                   </ul>
                </div>
                <div class="header-search-icon">
                   <button class="search-icon">
                      <i class="fas fa-search"></i>
                   </button>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="bottom-header">
       <div class="container d-flex justify-content-between align-items-center">
          <div class="site-identity">
             <h1 class="site-title">
                <a href="{{ url('/') }}">
                   <img class="white-logo" src="{{ asset('assets/images/travele-logo.png') }}" alt="logo">
                   <img class="black-logo" src="{{ asset('assets/images/travele-logo1.png') }}" alt="logo">
                </a>
             </h1>
          </div>
          <div class="main-navigation d-none d-lg-block">
             <nav id="navigation" class="navigation">
                <ul>
                   <li class="menu-item">
                      <a href="{{ url('/') }}">Home</a>
                   </li>
                   <li class="menu-item">
                     <a href="{{ url('/about') }}">About</a>
                   </li>
                   <li class="menu-item">
                      <a href="{{ url('/destination') }}">Destinations</a>
                   </li>
                   {{-- <li class="menu-item">
                      <a href="{{ url('/gallery') }}">Gallery</a>
                   </li> --}}
                   <li class="menu-item">
                    <a href="{{ url('/contact') }}">Contact</a>
                  </li>
                  @guest
                    @if (Route::has('login'))
                    <li class="menu-item">
                        <a href="{{ route('login') }}">Login</a>
                      </li>
                    @endif
                @else
                @endguest

                @if (Route::has('login'))
                @auth
                <li class="menu-item-has-children">
                    @php
                $userType = Auth::user()->user_type;
            @endphp
                    <a href="#Dashboard">Dashboard</a>
                    <ul>
                       <li>
                        @if ($userType === 'Admin')
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @elseif ($userType === 'Hotel')
                            <a href="{{ route('vendor.dashboard') }}">Dashboard</a>
                        @elseif ($userType === 'Tourist')
                            <a href="{{ route('tourist.dashboard') }}">Dashboard</a>
                        @elseif ($userType === 'Driver')
                            <a href="{{ route('driver.dashboard') }}">Dashboard</a>
                        @else
                        @endif
                       </li>
                       <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                 </li>
                @endauth
                @endif

                </ul>
             </nav>
          </div>
          <div class="header-btn">
            @if(Auth::check())
            @php
                $userType = Auth::user()->user_type;
            @endphp
            @if ($userType === 'Tourist')
            <a class="button-primary" href="{{ route('create_trip') }}">Create Trip</a>
            @endif
            &nbsp;
            @endif
            @guest
                    @if (Route::has('register'))
                     <a class="button-primary" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                @endguest
          </div>
       </div>
    </div>
    <div class="mobile-menu-container"></div>
 </header>
