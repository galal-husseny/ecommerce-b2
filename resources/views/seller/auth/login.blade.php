@extends('seller.layouts.parent')

@section('title', __('seller.auth.login.login'))

@section('content')
    @parent
    <div class="bg-login">
        <div class="container d-flex justify-content-center m-t-100 " style="margin-top: 100px">
            <div class="w-50 shadow p-3 mb-5 bg-white">
                <div class="card-body register-card-body">
                    <h4 class="title">{{ __('seller.auth.login.login_title') }}</h4>

                    <form action="{{ route('sellers.login') }}" method="POST">
                        @csrf
                        <!-- Email Address -->
                        <div class=" mb-3">
                            <input class="form-control p-3" type="email" name="email" :value="old('email')" required
                                autofocus placeholder="{{ __('seller.auth.login.email') }}">
                            @if ($errors->get('email'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('email') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Password -->
                        <div class=" mb-3">
                            <input class="form-control p-3" type="password" name="password" required autocomplete="new-password"
                                placeholder="{{ __('seller.auth.login.password') }}">
                            @if ($errors->get('password'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('password') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Remember Me -->
                        <div class="mb-3 form-check d-flex justify-content-around  mt-4">
                            <div>
                                <input type="checkbox" class="form-check-input border" id="remember_me" name="remember">
                                <label class=" text-sm text-dark mr-4"
                                    for="remember_me">{{ __('seller.auth.login.remember_me') }}</label>
                            </div>
                            @if (Route::has('sellers.password.request'))
                                <a class="mr-5 text-dark " href="{{ route('sellers.password.request') }}">
                                    {{ __('seller.auth.login.forgot_password') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="button-general">{{ __('seller.auth.login.login') }}</button>
                    </form>

                    <div class="social-auth-links text-center">
                        <p class="text-center">{{ __('seller.auth.register.or') }}</p>
                        <a href="#" class="button-general mb-2">
                            <i class="fab fa-facebook text-white mr-2"></i>
                            {{ __('seller.auth.login.login_facebook') }}
                        </a>
                        <a href="#" class="button-gmail">
                            <i class="fab fa-google-plus text-white mr-2"></i>
                            {{ __('seller.auth.login.login_google') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
