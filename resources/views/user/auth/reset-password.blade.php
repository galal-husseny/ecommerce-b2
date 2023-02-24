@extends('user.layouts.parent')

@section('title')
{{__("user.auth.reset_password")}}
@endsection

@section('content')
    @parent
    <div class="container p-t-20">
        <div class="m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

            <!-- Logo desktop -->
            <a href="#" class="logo p-t-20">
                <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
            </a>

            <form method="POST" action="{{ route('users.password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="email" value="{{__('user.auth.email')}}"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                        value="{{ old('email', $request->email )}}" required autofocus placeholder="{{__('user.auth.email_placeholder')}}">
                </div>

                @if($errors->get('email'))
                    <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('email') as $message)
                                {{$message}}  .<br/>
                            @endforeach
                    </div>
                @endif

                <!-- Password -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="password_confirmation" value="{{__('user.auth.password')}}"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" autofocus placeholder="{{__('user.auth.password')}}">
                </div>

                @if($errors->get('password_confirmation'))
                    <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('password_confirmation') as $message)
                                {{$message}}  .<br/>
                            @endforeach
                    </div>
                @endif
                
                <!-- Confirm Password  -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="password" value="{{__('user.auth.confirm_password')}}"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password" required autocomplete="current-password" autofocus placeholder="{{__('user.auth.confirm_password')}}">
                </div>

                @if($errors->get('password'))
                    <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('password') as $message)
                                {{ $message }}  .<br/>
                            @endforeach
                    </div>
                @endif

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{__('user.auth.reset_password')}}
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