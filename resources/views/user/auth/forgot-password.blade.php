@extends('user.layouts.parent')

@section('title', __('user.auth.forgot_password.title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@section('content')
    @parent
    <div class="container m-tb-200">
        <div class="m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('users.password.email') }}">
                @csrf
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('user.auth.forgot_password.message') }}
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="email" :value="__('Email')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                        :value="old('email')" required autofocus placeholder="{{ __('user.auth.forgot_password.email') }}">
                </div>
                @if ($errors->get('email'))
                        <ul class='text-sm text-red my-2'>
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{ __('user.auth.forgot_password.send_password_email_reset') }}
                </button>
            </form>
        </div>
    </div>
@endsection
