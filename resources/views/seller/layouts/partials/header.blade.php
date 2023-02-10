
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop shadow bg-white" >

        <div class="wrap-menu-desktop" style="top:0; background-color: white; width:100%;">
            <nav class="limiter-menu-desktop mx-auto" style="width: 90%">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('sellers.dashboard') }}">Home</a>
                        </li>

                        <li>
                            <a href="">Shop</a>
                        </li>

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link fs-header-icons" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-header-icons" data-toggle="dropdown" href="">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dashboard-assets/dist/img/user1-128x128.jpg') }}"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dashboard-assets/dist/img/user8-128x128.jpg') }}"
                                        alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dashboard-assets/dist/img/user3-128x128.jpg') }}"
                                        alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-header-icons"" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <ul class="main-menu">
                            <li>
                                <a href="" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                                    style="font-size: 1.5rem">
                                    <i class="zmdi zmdi-account"></i>
                                </a>

                                <ul class="sub-menu">
                                    @auth('seller')
                                        <li><a href="{{ route('sellers.profile.edit') }}">Profile</a></li>
                                        <form method="POST" action="{{ route('sellers.logout') }}">
                                            @csrf
                                            <li><a href="route('sellers.logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a>
                                            </li>
                                        </form>
                                    @else
                                        <li><a href="{{ route('sellers.login') }}">Login</a></li>
                                        <li><a href="{{ route('sellers.register') }}">Register</a></li>
                                    @endauth
                                </ul>

                            </li>
                        </ul>
                    </li>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}"
                    alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
            <li class="nav-item dropdown">
                <ul class="main-menu">
                    <li>
                        <a href="" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                            style="font-size: 1.5rem">
                            <i class="zmdi zmdi-account"></i>
                        </a>

                        <ul class="sub-menu">
                            @auth('seller')
                                <li><a href="{{ route('sellers.profile.edit') }}">Profile</a></li>
                                <form method="POST" action="{{ route('sellers.logout') }}">
                                    @csrf
                                    <li><a href="route('sellers.logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">Logout</a>
                                    </li>
                                </form>
                            @else
                                <li><a href="{{ route('sellers.login') }}">Login</a></li>
                                <li><a href="{{ route('sellers.register') }}">Register</a></li>
                            @endauth
                        </ul>

                    </li>
                </ul>
            </li>


        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('frontend-assets/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>

        </div>

    </div>
</header>
