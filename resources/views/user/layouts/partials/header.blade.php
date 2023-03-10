<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop ">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    {{ __('user.header.free_shipping') }}
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a style="text-decoration: none" href="#" class="py-2 px-4 ">
                        {{ __('user.header.faq') }}
                    </a>
                    @foreach (LaravelLocalization::getSupportedLocales() as $lang => $value)
                        @if ($lang == App::currentLocale())
                            @continue
                        @endif
                        <a style="text-decoration: none" rel="alternate" hreflang="{{ $lang }}" href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}"class="py-2 px-4">
                            {{ Str::upper($lang) }}
                        </a>
                    @endforeach
                        <a style="text-decoration: none" class="py-2 px-4" href="{{ route('sellers.index') }}"> {{__('user.header.seller_account')}}
                        </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop bg-white">
            <nav class="limiter-menu-desktop container" style="width: 90%">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a style="text-decoration: none" href="{{ route('users.dashboard') }}"> {{ __('user.header.home') }} </a>
                        </li>

                        <li>
                            <a style="text-decoration: none" href="{{ route('shop') }}"> {{ __('user.header.shop') }} </a>
                        </li>

                        <li>
                            <a style="text-decoration: none" href="{{ route('blog') }}"> {{ __('user.header.blog') }} </a>
                        </li>

                        <li>
                            <a style="text-decoration: none" href="{{ route('about') }}"> {{ __('user.header.about') }} </a>
                        </li>

                        <li>
                            <a style="text-decoration: none" href="{{ route('contact') }}"> {{ __('user.header.contact') }} </a>
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
                        <a href="{{route('cart')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                    <ul class="main-menu">
                        <li>
                            <a class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                                style="font-size: 2rem">
                                <i class="zmdi zmdi-account"></i>
                            </a>

                            <ul class="sub-menu">
                                @auth('web')
                                    <li><a style="text-decoration: none" href="{{ route('users.profile.edit') }}"> {{__('user.profile.profile')}} </a></li>
                                    <form method="POST" action="{{ route('users.logout') }}">
                                        @csrf
                                        <li><a style="text-decoration: none" href="route('users.logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();"> {{__('user.header.logout')}} </a>
                                        </li>
                                    </form>
                                @else
                                    <li><a style="text-decoration: none" href="{{ route('users.login') }}"> {{__('user.header.login')}} </a></li>
                                    <li><a style="text-decoration: none" href="{{ route('users.register') }}"> {{__('user.header.register')}} </a></li>
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

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    {{-- <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile p-0">
            <li>
                <div class="left-top-bar">
                    {{ __('user.header.free_shipping') }}
                </div>
            </li>
            <li>
                <div class="right-top-bar flex-w h-full">
                    <a style="text-decoration: none" href="#" class="flex-c-m trans-04 p-lr-25">
                        {{ __('user.header.faq') }}
                    </a>

                    @foreach (LaravelLocalization::getSupportedLocales() as $lang => $value)
                        @if ($lang == App::currentLocale())
                            @continue
                        @endif
                        <a style="text-decoration: none" rel="alternate" hreflang="{{ $lang }}" href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}"class="flex-c-m trans-04 p-lr-25">
                            {{ Str::upper($lang) }}
                        </a>
                    @endforeach

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        {{ __('user.header.currency') }}
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{ route('users.dashboard') }}">{{ __('user.header.home') }}</a>
                
                <ul class="sub-menu-m">
                    <li><a href="{{ route('users.dashboard') }}">{{ __('user.header.home') }}</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a style="text-decoration: none" href="{{ route('shop') }}"> {{ __('user.header.shop') }} </a>
            </li>

            <li>
                <a style="text-decoration: none" href="{{ route('blog') }}"> {{ __('user.header.blog') }} </a>
            </li>

            <li>
                <a style="text-decoration: none" href="{{ route('about') }}"> {{ __('user.header.about') }} </a>
            </li>

            <li>
                <a style="text-decoration: none" href="{{ route('contact') }}"> {{ __('user.header.contact') }} </a>
            </li>
            <li>
                <a style="text-decoration: none" href="{{ route('sellers.index') }}"> {{__('user.header.seller_account')}} </a>
            </li>
        </ul>
    </div> --}}

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

    <!-- Modal Verify Email -->
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <div class="modal flex-c-m trans-04">
            <div class="container p-t-80 ">
                <div class="bg-light m-auto w-75 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

                    <button class="flex-c-m btn trans-04 mb-4 close-modal-email-verify">
                        <img src="{{ asset('frontend-assets/images/icons/icon-close2.png') }}" alt="CLOSE">
                    </button>
                    
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('user.auth.verify_email.verify_email_head') }}
                    </div>
    
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('user.auth.verify_email.verify_email_confrmation') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('users.verification.send') }}">
                        @csrf
                        
                        <!-- Logo desktop -->
                        <a href="#" class="logo p-t-20">
                            <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
                        </a>
    
                        <button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                            {{__('user.auth.verify_email.confirm')}}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('users.logout') }}">
                        @csrf
    
                        <button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                            {{__('user.auth.verify_email.logout')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</header>

<script>
     /*==================================================================
    [ Show / hide modal search ]*/
    
</script>
