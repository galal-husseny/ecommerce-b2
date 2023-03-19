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
    <div class="container m-tb-100">
        <div class="m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('user.auth.confirm_password.confirm_password_title') }}
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
