
@extends('user.layouts.parent')

@section('title', __('user.auth.register.register'))

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

@section('content')
@parent
<div class="container m-t-200">
    <div class="m-lr-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md m-b-100">
        <form method="POST" action="{{ route('users.register') }}">
            @csrf

            <h4 class="mtext-105 cl2 txt-center p-b-30">
                {{__('user.auth.register.register')}}
            </h4>

            <!-- Name -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="form-control " id="name" type="text" name="name"
                    value="{{old('name')}}" required autofocus placeholder="{{__('user.auth.register.full_name')}}">
                @if ($errors->get('name'))
                    <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                        @foreach ($errors->get('name') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Email -->
            <div class=" m-b-20 how-pos4-parent">
                <input class="form-control" id="email" type="email" name="email"
                    value="{{old('email')}}" required placeholder="{{__('user.auth.register.email')}}">
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
                <input class="form-control" id="phone" type="number" name="phone" value="{{old('phone')}}" required placeholder="{{__('user.auth.register.phone_number')}}">
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
                <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="{{__('user.auth.register.password')}}">
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
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" placeholder="{{__('user.auth.register.confirm_password')}}">
                @if ($errors->get('password_confirmation'))
                        <ul class='text-danger  space-y-1 mt-2'>
                            @foreach ($errors->get('password_confirmation') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                @endif
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a class="text-underline text-dark" href="{{ route('users.login') }}">
                    {{__('user.auth.register.registered')}}
                </a>

                <button class=" stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{__('user.auth.register.register')}}
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

