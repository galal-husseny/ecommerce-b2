@extends('seller.layouts.parent')

@section('title', 'Register')

@push('links')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/dist/css/adminlte.min.css') }}">
@endpush

<div class="container d-flex justify-content-center m-t-100">
    <div class="register-box shadow p-3 mb-5 bg-body rounded">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ route('sellers.register') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" :value="old('name')" required autofocus
                        placeholder="Full name">
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
                    <input class="form-control" type="text" name="shop_name" :value="old('shop_name')" required
                        placeholder="Shop Name">
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
                        placeholder="Email">
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
                    <input class="form-control" type="number" name="phone" :value="old('phone')" required
                        placeholder="Phone Number">
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
                    <input class="form-control" type="password" name="password" required autocomplete="new-password"
                        placeholder="Password">
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
                        placeholder="Confirm password">
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
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-dark btn-block rounded-pill">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary rounded-pill">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger rounded-pill">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="{{ route('sellers.login') }}" class="text-center text-dark">Already registered?</a>
        </div>
        <!-- /.form-box -->
    </div>
</div>
<!-- /.register-box -->
