@extends('user.layouts.parent')

@section('title', __('user.auth.verify_email.title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <div class="container m-tb-100">
        <div class="m-auto w-75 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('user.auth.verify_email.verify_email_head') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('user.auth.verify_email.verify_email_confrmation') }}
                </div>
            @endif
            <form method="POST" action="{{ route('users.verification.send') }}">
                @csrf
                <button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                    {{__('user.auth.verify_email.confirm')}}
                </button>
            </form>
            <form method="POST" action="{{ route('users.logout') }}">
                @csrf

                <button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                    {{__('user.auth.verify_email.logout')}}
                </button>
            </form>
        </div>
    </div>
@endsection
