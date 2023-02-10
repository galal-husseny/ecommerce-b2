
@extends('seller.layouts.parent')

@section('title', 'Login')

<div class="container d-flex justify-content-center m-t-100">
    <div class="register-box shadow p-3 mb-5 bg-body rounded">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Login to your seller account</p>

                <form action="{{ route('sellers.login') }}" method="POST">
                    @csrf
                    <!-- Email Address -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->get('email'))
                            <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                @foreach ($errors->get('email') as $message)
                                    <li class="text-danger">{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->get('password'))
                            <ul class = 'text-danger  space-y-1 mt-2'>
                                @foreach ($errors->get('password') as $message)
                                    <li class="text-danger">{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" class="rounded" id="agreeTerms" name="remember" value="agree">
                                <label for="agreeTerms">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-dark btn-block rounded-pill">Log in</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p class="text-center">- OR -</p>
                    <a href="#" class="btn btn-block btn-primary rounded-pill">
                        <i class="fab fa-facebook mr-2"></i>
                        Log in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger rounded-pill">
                        <i class="fab fa-google-plus mr-2"></i>
                        Log in using Google+
                    </a>
                </div>

                @if (Route::has('sellers.password.request'))
                    <a href="{{ route('sellers.password.request') }}" class="text-center text-dark">Forgot your password?</a>
                @endif
            </div>
            <!-- /.form-box -->
    </div>
</div>
