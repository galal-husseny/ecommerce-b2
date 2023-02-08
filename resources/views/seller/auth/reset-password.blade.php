{{-- <x-guest-seller-layout>
    <form method="POST" action="{{ route('sellers.password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-seller-layout> --}}


@extends('seller.layouts.parent')

@section('title', 'Reset password')

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

<div class="container d-flex justify-content-center m-t-300">
    <div class="w-75 shadow p-3 mb-5 bg-body rounded">
            <div class="card-body register-card-body">
                <form action="{{ route('sellers.password.store') }}" method="POST">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <!-- Email Address -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" value="{{$request->input('email')}}" required autofocus placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->get('email'))
                            <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->get('password'))
                            <ul class = 'text-danger  space-y-1 mt-2'>
                                @foreach ($errors->get('password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- Confirm Password -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->get('password_confirmation'))
                            <ul class = 'text-danger  space-y-1 mt-2'>
                                @foreach ($errors->get('password_confirmation') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-block rounded-pill" style="background-color: black;">Reset Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
    </div>
</div>
