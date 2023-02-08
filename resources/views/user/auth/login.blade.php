@extends('user.layouts.parent')

@section('title', 'Login')

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

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('content')
@parent
<div class="container m-t-200">
    <div class="m-lr-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md m-b-100">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('users.login') }}">
            @csrf

            <h4 class="mtext-105 cl2 txt-center p-b-30">
                User Login
            </h4>
            <!-- Email -->
            <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                    value="{{old('email')}}" required autofocus placeholder="Your Email Address">

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
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password"type="password" name="password"
                    required autocomplete="current-password" placeholder="Your Password">

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
                    <input type="checkbox" class="form-check-input" id="remember_me"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <label class=" text-sm text-gray-600 dark:text-gray-400" for="remember_me">Remember me</label>
                </div>
                @if (Route::has('users.password.request'))
                    <a class="m-r-50 underline text-dark text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('users.password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
