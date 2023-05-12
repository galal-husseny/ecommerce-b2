@extends('user.layouts.parent')

@section('title', __('user.auth.login.login'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('links')
    <link rel="stylesheet" href="{{ asset('custom-css/user.css') }}">
@endpush

@section('content')
    @parent
    <div class="" style="background-image: url({{ asset('frontend-assets/images/about-02.jpg') }}); height: 100vh; background-size: cover;">
        <div class="container d-flex justify-content-center" style="margin-top: 50px">
            <div class="w-50 shadow p-3 mb-5 bg-white" style="margin-top: 100px">
                <div class="card-body register-card-body">
                    <div class="mb-2" style="text-align: center">
                        <a href="" class=" mr-auto">
                            <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="height: 1rem">
                        </a>
                    </div>
                    <form method="POST" action="{{ route('users.login') }}">
                        @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            {{ __('user.auth.login.login_title') }}
                        </h4>
                        <!-- Email -->
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="form-control" id="email" type="email" name="email"
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
                            <input class="form-control" id="password"type="password" name="password"
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
                        </div>

                        <button class="button-general">
                            {{ __('user.auth.login.login') }}
                        </button>
                        <div class="mb-3 d-flex justify-content-between  mt-4">
                            @if (Route::has('users.register'))
                                <a class="mr-5 text-dark " href="{{ route('users.register') }}">
                                    {{ __('user.auth.register.register_title') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    <div class="social-auth-links text-center">
                        <p class="text-center mb-2">{{ __('user.auth.login.or') }}</p>
                        <a href="#" class="button-facebook mb-2">
                            {{ __('user.auth.login.login_facebook') }}
                            <i class="fab fa-facebook text-white mx-2"></i>
                        </a>
                        <a href="#" class="button-gmail">
                            {{ __('user.auth.login.login_google') }}
                            <i class="fab fa-google-plus text-white mx-2"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
