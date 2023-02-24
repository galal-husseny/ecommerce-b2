@extends('user.layouts.parent')

@section('title')
{{__("user.auth.verify_email")}}
@endsection

@section('content')
    @parent
    <div class="container m-tb-100">
        <div class="m-auto w-75 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

            <!-- Logo desktop -->
            <a href="#" class="logo p-t-20">
                <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
            </a>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('user.auth.verify_email_head') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('user.auth.verify_email_confrmation') }}
                </div>
            @endif
            <form method="POST" action="{{ route('users.verification.send') }}">
                @csrf
                <button  class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                    {{__('user.auth.confirm')}}
                </button>
            </form>
            <form method="POST" action="{{ route('users.logout') }}">
                @csrf

                <button  class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6" >
                    {{__('logout')}}
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
