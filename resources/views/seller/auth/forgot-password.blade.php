{{-- <x-guest-seller-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('sellers.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-seller-layout> --}}


@extends('seller.layouts.parent')

@section('title', 'Forgot password')

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('content')
@parent
<div class="container d-flex justify-content-center m-t-250">
    <div class="w-50 shadow p-3 mb-5 bg-body rounded">
        <!-- Session Status -->
        @if (session('status'))
            <div class = 'font-medium text-sm text-green-600 dark:text-green-400'>
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body register-card-body">
            <p class="m-b-30">Forgot your password? No problem. Just let us know your email address and we will email you
                a password reset link that will allow you to choose a new one.</p>

            <form action="{{ route('sellers.password.email') }}" method="POST">
                @csrf
                <!-- Email Address -->
                <div class="input-group mb-3">
                    <input class="form-control" type="email" name="email" :value="old('email')" required autofocus
                        placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if ($errors->get('email'))
                        <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark btn-block rounded-pill" style="background-color: black;">Email Password Reset
                            Link</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
        <!-- /.card -->
    </div>
</div>
@endsection
