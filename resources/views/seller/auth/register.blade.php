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
        <div class="container d-flex justify-content-center w-50 m-t-100" style="margin-top: 100px">
            <div class="register-box shadow p-3 mb-5 bg-body rounded">
                <div class="card-body register-card-body">
                    <h3 class="login-box-msg">{{__('seller.auth.register.register_title')}}</h3>

                    <form action="{{ route('sellers.register') }}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" :value="old('name')" required autofocus placeholder="{{__('seller.auth.register.full_name')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @if ($errors->get('name'))
                                <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('name') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- shop_name -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="shop_name" :value="old('shop_name')" required placeholder="{{__('seller.auth.register.shop_name')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @if ($errors->get('shop_name'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('shop_name') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Email Address -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="email" name="email" :value="old('email')" required
                                placeholder="{{__('seller.auth.login.email')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @if ($errors->get('email'))
                                <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                    @foreach ($errors->get('email') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Phone -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" name="phone" :value="old('phone')" required placeholder="{{__('seller.auth.register.phone_number')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calculator"></span>
                                </div>
                            </div>
                            @if ($errors->get('phone'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('phone') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="{{__('seller.auth.login.password')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @if ($errors->get('password'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('password') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="password" name="password_confirmation" required
                                placeholder="{{__('seller.auth.register.confirm_password')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @if ($errors->get('password_confirmation'))
                                <ul class='text-danger  space-y-1 mt-2'>
                                    @foreach ($errors->get('password_confirmation') as $message)
                                        <li class="text-danger">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                    <label for="agreeTerms">
                                        {{__('seller.auth.register.agree')}} <a href="#">{{__('seller.auth.register.terms')}}</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-5">
                                <button type="submit" class="btn btn-dark btn-block rounded-pill">{{__('seller.auth.register.register')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <p class="text-center">{{__('seller.auth.register.or')}}</p>
                        <a href="#" class="btn btn-block btn-primary rounded-pill">
                            <i class="fab fa-facebook mr-2"></i>
                            {{__('seller.auth.login.login_facebook')}}
                        </a>
                        <a href="#" class="btn btn-block btn-danger rounded-pill">
                            <i class="fab fa-google-plus mr-2"></i>
                            {{__('seller.auth.login.login_google')}}
                        </a>
                    </div>

                    <a href="{{ route('sellers.login') }}" class="text-center text-dark">{{__('seller.auth.register.registered')}}</a>
                </div>
                <!-- /.form-box -->
            </div>
        </div>
    </div>

@endsection
