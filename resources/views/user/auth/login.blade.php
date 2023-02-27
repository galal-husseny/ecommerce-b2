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
    <link rel="stylesheet" href="{{asset('custom-css/user.css')}}">
@endpush

@section('content')
    @parent
    <div class="bg-login">
    <div class="container d-flex justify-content-center align-items-center m-t-200 ">
        <div class=" w-50 p-3 bg-white" style="margin-bottom: 10rem">
            <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('users.login') }}">
                @csrf

                <h4 class="title">
                    {{ __('user.auth.login.login_title') }}
                </h4>
                <!-- Email -->
                <div class=" mb-3">
                    <input class="form-control p-3" id="email" type="email" name="email"
                        value="{{ old('email') }}" required autofocus placeholder="{{ __('user.auth.login.email') }}">
                @if ($errors->get('email'))
                    <ul class='text-sm text-red-600 dark:text-red-400  m-t-20'>
                        @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <!-- Password -->
                <div class="bor8 m-tb-20 how-pos4-parent">
                    <input class="form-control p-3" id="password"type="password" name="password"
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
                        <label class=" text-sm text-dark mr-4"
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
            </form>
        </div>
        </div>
    </div>
    </div>
@endsection
