@extends('seller.layouts.parent')

@section('title', __('seller.auth.register.register'))

@push('links')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/dist/css/adminlte.min.css') }}">
@endpush

@section('content')
    @parent
    <div class="bg-register">
        <div class="container d-flex justify-content-center" style="margin-top: 100px">
            <div class="w-50 shadow p-3 mb-5 bg-white">
                <div class="card-body register-card-body">
                    <div class="mb-2" style="text-align: center">
                        <a href="" class="logo mr-auto">
                            <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="height: 1rem">
                        </a>
                    </div>
                    <h4 class="title">
                        {{ __('seller.auth.register.register_title') }}
                    </h4>
                    <form method="POST" action="{{ route('sellers.register') }}">
                        @csrf
                        <!-- Name -->
                        <div class=" mb-3">
                            <input type="text" class="form-control p-3" name="name" :value="old('name')" required
                                autofocus placeholder="{{ __('seller.auth.register.full_name') }}">
                            @if ($errors->get('name'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('name') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- shop_name -->
                        <div class="mb-3">
                            <input class="form-control p-3" type="text" name="shop_name" :value="old('shop_name')" required
                                placeholder="{{ __('seller.auth.register.shop_name') }}">
                            @if ($errors->get('shop_name'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('shop_name') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Email Address -->
                        <div class="mb-3">
                            <input class="form-control p-3" type="email" name="email" :value="old('email')" required
                                placeholder="{{ __('seller.auth.login.email') }}">
                            @if ($errors->get('email'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('email') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <input class="form-control p-3" type="number" name="phone" :value="old('phone')" required
                                placeholder="{{ __('seller.auth.register.phone_number') }}">
                            @if ($errors->get('phone'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('phone') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <input class="form-control p-3" type="password" name="password" required autocomplete="new-password"
                                placeholder="{{ __('seller.auth.login.password') }}">
                            @if ($errors->get('password'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('password') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <input class="form-control p-3" type="password" name="password_confirmation" required
                                placeholder="{{ __('seller.auth.register.confirm_password') }}">
                            @if ($errors->get('password_confirmation'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('password_confirmation') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Remember Me -->
                        <div class="mb-3 form-check d-flex justify-content-around  mt-4">
                            <div>
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    {{ __('seller.auth.register.agree') }} <a
                                        href="#">{{ __('seller.auth.register.terms') }}</a>
                                </label>

                            </div>
                            <a class="text-underline text-dark col-5" href="{{ route('sellers.login') }}">
                                {{ __('seller.auth.register.registered') }}
                            </a>
                        </div>
                        <button type="submit" class="button-general mt-2">{{ __('seller.auth.register.register') }}</button>
                        <div class=" text-center">
                            <p class="text-center my-2">{{ __('seller.auth.register.or') }}</p>
                            <a href="#" class="button-facebook ">
                                {{ __('seller.auth.login.login_facebook') }}
                                <i class="fab fa-facebook mx-2 text-white"></i>
                            </a>
                            <a href="#" class="button-gmail mt-3">
                                {{ __('seller.auth.login.login_google') }}
                                <i class="fab fa-google-plus mx-2 text-white"></i>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
