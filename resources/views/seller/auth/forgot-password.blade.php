@extends('seller.layouts.parent')

@section('title', __('seller.auth.forgot_password.title'))

@push('scripts')
    @vite('resources/js/app.js')
@endpush

@push('links')
    @vite('resources/css/app.css')
@endpush

@section('content')
    @parent
    <div class="container d-flex justify-content-center m-t-150" style="margin-top: 150px">
        <div class="w-50 shadow p-3 mb-5 bg-body rounded">
            @if (session('status'))
                <!-- Session Status -->
                <div class='font-medium text-sm text-green-600 dark:text-green-400'>
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body register-card-body mb-6">
                <p class="mb-6">{{ __('seller.auth.forgot_password.message') }}</p>

                <form action="{{ route('sellers.password.email') }}" method="POST">
                    @csrf
                    <!-- Email Address -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" :value="old('email')" required autofocus
                            placeholder="{{ __('seller.auth.login.email') }}">
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
                            <button type="submit" class="btn bg-dark btn-block rounded-pill"
                                style="background-color: black;">{{ __('seller.auth.forgot_password.send_password_email_reset') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
