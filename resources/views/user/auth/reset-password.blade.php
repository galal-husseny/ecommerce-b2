@extends('user.layouts.parent')

@section('title', __('user.auth.reset_password.page_title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <div class="container m-tb-200">
        <div class="m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

            <form method="POST" action="{{ route('users.password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="email" :value="__('Email')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                        value="{{ old('email', $request->email) }}" required autofocus placeholder="Your Email Address">
                </div>
                @if ($errors->get('email'))
                    <ul class='text-sm text-red my-2'>
                        @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <!-- Password -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="password" :value="__('Password')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password"
                        name="password" required autocomplete="current-password" autofocus
                        placeholder="{{__('user.auth.reset_password.password')}}">
                </div>
                @if ($errors->get('password'))
                    <ul class='text-sm text-red my-2'>
                        @foreach ($errors->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <!-- Confirm Password  -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="password" :value="__('Confirm Password')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password_confirmation"
                        required autocomplete="current-password" autofocus placeholder="{{__('user.auth.reset_password.confirm_password')}}">
                </div>
                @if ($errors->get('password_confirmation'))
                    <ul class='text-sm text-red my-2'>
                        @foreach ($errors->get('password_confirmation') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{__('user.auth.reset_password.page_title')}}
                </button>
            </form>
        </div>
    </div>
@endsection
