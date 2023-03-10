@extends('user.layouts.parent')

@section('title', __('user.auth.login.login'))

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('links')
    <link rel="stylesheet" href="{{asset('custom-css/user.css')}}">
@endpush

@section('content')
    @parent
    <div class="vh-100" style="background-image: url({{ asset('frontend-assets/images/blog-04.jpg') }}); background-size: cover;">
        <div class="container p-t-40 ">
            <div class="bg-light m-lr-auto size-210 bor10 p-lr-70 p-t-20 p-b-10 p-lr-15-lg w-full-md m-b-50 m-t-50">
            
                <!-- Logo desktop -->
                <a href="#" class="logo p-t-20">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
                </a>
                
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{__('user.auth.reset')}}
                    </div>
                @endif
                

                <form method="POST" action="{{ route('users.login') }}">
                    @csrf
                    

                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        {{ __('user.auth.login.login_title') }}
                    </h4>
                    <!-- Email -->
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                            value="{{ old('email') }}" required autofocus placeholder="{{ __('user.auth.login.email') }}">

                    </div>
                    @if ($errors->get('email'))
                        <ul class='text-sm text-red-600 dark:text-red-400  m-t-20'>
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Password -->
                    <div class="bor8 m-tb-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password"type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('user.auth.login.password') }}">

                    </div>
                    @if ($errors->get('password'))
                        <ul class='text-danger  space-y-1 mt-20'>
                            @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Remember Me -->
                    <div class="mb-3 form-check d-flex justify-content-around  mt-4">
                        <div>
                            <input type="checkbox" class="form-check-input border" id="remember_me" name="remember">
                            <label class=" text-sm text-gray-600 dark:text-gray-400 mr-4"
                                for="remember_me">{{ __('user.auth.login.remember_me') }}</label>
                        </div>
                        @if (Route::has('users.password.request'))
                            <a class="mr-5 text-dark " href="{{ route('users.password.request') }}">
                                {{ __('user.auth.login.forgot_password') }}
                            </a>
                        @endif
                        @if (Route::has('users.register'))
                            <a class="mr-5 text-dark " href="{{ route('users.register') }}">
                                {{ __('user.auth.register.register_title') }}
                            </a>
                        @endif
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        {{ __('user.auth.login.login') }}
                    </button>
                </form>
                <p class="stext-107 cl6 txt-center bg-gray p-t-20">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
@endsection
