@extends('user.layouts.parent')

@section('title')
{{__("user.auth.login")}}
@endsection

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@section('content')
    @parent
    <div class="container p-t-20">
        <div class="m-lr-auto size-210 bor10 p-lr-70 p-t-20 p-b-10 p-lr-15-lg w-full-md m-b-50 m-t-50">
            
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
                    {{__('user.auth.login_title')}}
                </h4>

                <!-- Email -->
                <div class="bor8 m-b-20 how-pos4-parent">
                <!-- <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="{{__('user.auth.email')}}"> -->
                <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="{{__('user.auth.your', ['name' => 'email'])}}">
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
                    <input class="form-control" id="password"type="password" name="password" required autocomplete="current-password" placeholder="{{__('user.auth.password')}}">
                </div>
                @if ($errors->get('password'))
                    <ul class='text-danger space-y-1 mt-20'>
                        @foreach ($errors->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <!-- Remember Me -->
                <div class="mb-3 form-check d-flex justify-content-around  mt-4">
                    <div>
                        <input type="checkbox" class="form-check-input border" id="remember_me" name="remember">
                        <label class=" text-sm text-gray-600 dark:text-gray-400" for="remember_me">{{__('user.auth.remember_me')}}</label>
                    </div>
                    @if (Route::has('users.password.request'))
                        <a class="m-r-50 underline text-dark text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('users.password.request') }}">
                            {{__('user.auth.forgot_password')}}
                        </a>
                    @endif
                </div>

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{__('user.auth.log_in')}}
                </button>
            </form>
            <p class="stext-107 cl6 txt-center bg-gray p-t-20">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
@endsection
