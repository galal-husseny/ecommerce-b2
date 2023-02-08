
@extends('user.layouts.parent')

@section('title' , 'Verify Email')

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@endpush

@section('content')
@parent
<div class="container m-tb-100">
    <div class="m-auto w-75 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
        <form method="POST" action="{{ route('sellers.verification.send') }}">
            @csrf
            <button  class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6">
                Confirm
            </button>
        </form>
        <form method="POST" action="{{ route('sellers.logout') }}">
            @csrf

            <button  class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mx-auto m-t-6" >
                Log Out
            </button>
        </form>
    </div>
</div>
@endsection
