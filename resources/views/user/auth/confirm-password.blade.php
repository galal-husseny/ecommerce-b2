@extends('user.layouts.parent')

@section('title', __('user.auth.confirm_password.page_title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <div class="" style="background-image: url({{ asset('frontend-assets/images/about-02.jpg') }}); height: 100vh; background-size: cover;">
        <div class="container p-t-80 ">
            <div class="bg-light m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('user.auth.confirm_password.confirm_password_title') }}
                </div>

                <!-- Logo desktop -->
                <a href="#" class="logo p-t-20">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
                </a>

                <form method="POST" action="{{ route('users.password.confirm') }}">
                    @csrf
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('user.auth.confirm_password.message') }}
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <label for="password" :value="__('Password')"></label>
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password"
                            required autocomplete="current-password" autofocus placeholder="Your password">
                    </div>
                    @if ($errors->get('password'))
                        <ul class='text-sm text-red my-2'>
                            @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        {{__('user.auth.confirm_password.confirm')}}
                    </button>
                </form>
                <p class="stext-107 cl6 txt-center bg-gray p-t-20">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <form method="POST" action="{{ route('users.password.confirm') }}">
                @csrf
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('user.auth.confirm_password.message') }}
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="password" :value="__('Password')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password"
                        required autocomplete="current-password" autofocus placeholder="Your password">
                </div>
                @if ($errors->get('password'))
                    <ul class='text-sm text-red my-2'>
                        @foreach ($errors->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{__('user.auth.confirm_password.confirm')}}
                </button>
            </form>
        </div>
    </div>
@endsection
