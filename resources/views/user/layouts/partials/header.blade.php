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

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Auth::guard('web')->check() ? $user->carts_count :0}}" id="cart">
                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-wishlist" data-notify="{{Auth::guard('web')->check() ? $user->wishlists_count :0}}" id="wishlist">
                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>

                    <ul class="main-menu">
                        <li>
                            <a href="" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
                                style="font-size: 2rem">
                                <i class="zmdi zmdi-account"></i>
                            </a>

                            <ul class="sub-menu">
                                @auth('web')
                                    <li><a style="text-decoration: none" href="{{ route('users.profile.edit') }}"> {{__('user.profile.profile')}} </a></li>
                                    <li><a style="text-decoration: none" href="{{ route('users.address.index') }}"> {{__('user.header.addresses')}} </a></li>
                                    <li><a style="text-decoration: none" href="{{ route('users.orders.index') }}"> {{__('user.header.orders')}} </a></li>
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
    @auth('web')
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())

            <div class="modal flex-c-m m-auto w-50 trans-04 modal-verify-email" id="modal_verify_email">
                <div class="container p-t-80 ">
                    <div class="bg-light m-auto bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

                        <button class="flex-c-m btn trans-04 mb-4 close-modal-email-verify" onclick="closeModal()">
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
    @endauth

</header>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    function closeModal(){
        document.getElementById("modal_verify_email").style.opacity = "0";
    }
    $('body').click(function (event){
        if(!$(event.target).closest('#modal_verify_email').length && !$(event.target).is('#modal_verify_email')) {
            $("#modal_verify_email").hide();
        }
    });
</script>
