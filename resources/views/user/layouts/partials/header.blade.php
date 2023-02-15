<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    {{ __('messages.user.header.free_shipping') }}
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        {{ __('messages.user.header.faq') }}
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        {{ __('messages.user.header.lang') }}
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        {{ __('messages.user.header.currency') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container" style="width: 90%">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('users.dashboard') }}"> {{ __('messages.user.header.home') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('shop') }}"> {{ __('messages.user.header.shop') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('blog') }}"> {{ __('messages.user.header.blog') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}"> {{ __('messages.user.header.about') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}"> {{ __('messages.user.header.contact') }} </a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#"
                        class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                    <ul class="main-menu">
                        <li>
                            <a href="" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                                style="font-size: 2rem">
                                <i class="zmdi zmdi-account"></i>
                            </a>

                            <ul class="sub-menu">
                                @auth('web')
                                    <li><a href="{{ route('users.profile.edit') }}"> {{__('messages.user.profile.profile')}} </a></li>
                                    <form method="POST" action="{{ route('users.logout') }}">
                                        @csrf
                                        <li><a href="route('users.logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();"> {{__('messages.user.auth.logout')}} </a>
                                        </li>
                                    </form>
                                @else
                                    <li><a href="{{ route('users.login') }}"> {{__('messages.user.auth.Log_in')}} </a></li>
                                    <li><a href="{{ route('users.register') }}"> {{__('messages.user.auth.register')}} </a></li>
                                    <li><a href="{{ route('sellers.index') }}"> {{__('messages.user.header.seller_account')}} </a></li>
                                @endauth
                            </ul>

                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
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

            <ul class="main-menu">
                <li>
                    <a href="" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                        style="font-size: 2rem">
                        <i class="zmdi zmdi-account"></i>
                    </a>

                    <ul class="sub-menu">
                        @auth('web')
                            <li><a href="{{ route('users.profile.edit') }}">Profile</a></li>
                            <form method="POST" action="{{ route('users.logout') }}">
                                @csrf
                                <li><a href="route('users.logout')"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
                                </li>
                            </form>
                        @else
                            <li><a href="{{ route('users.login') }}">Login</a></li>
                            <li><a href="{{ route('users.register') }}">Register</a></li>
                            <li><a href="{{ route('sellers.index') }}">Your Seller Account</a></li>
                        @endauth
                    </ul>

                </li>
            </ul>


        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.html">Home</a>
                <ul class="sub-menu-m">
                    <li><a href="index.html">Homepage 1</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="product.html">Shop</a>
            </li>

            <li>
                <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="blog.html">Blog</a>
            </li>

            <li>
                <a href="about.html">About</a>
            </li>

            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
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
