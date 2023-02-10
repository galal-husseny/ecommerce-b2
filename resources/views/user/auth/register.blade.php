
@extends('user.layouts.parent')

@section('title', 'Register')

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
        <form method="POST" action="{{ route('users.register') }}">
            @csrf

            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Rigester as User
            </h4>

            <!-- Name -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="border-grey stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="name" type="text" name="name"
                    value="{{old('name')}}" required autofocus placeholder="Name">
                @if ($errors->get('name'))
                    <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                        @foreach ($errors->get('name') as $message)
                            <li class="text-danger">{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Email -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                    value="{{old('email')}}" required placeholder="Your Email Address">
                @if ($errors->get('email'))
                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                        @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Phone -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="phone" type="number" name="phone" value="{{old('phone')}}" required placeholder="Your Phone Number">
                @if ($errors->get('phone'))
                        <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                            @foreach ($errors->get('phone') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                @endif
            </div>

            <!-- Password -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Your Password">
                @if ($errors->get('password'))
                        <ul class='text-danger  space-y-1 mt-2'>
                            @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password">
                @if ($errors->get('password_confirmation'))
                        <ul class='text-danger  space-y-1 mt-2'>
                            @foreach ($errors->get('password_confirmation') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                @endif
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('users.login') }}">
                    Already registered?
                </a>

                <button class=" stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Register
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

