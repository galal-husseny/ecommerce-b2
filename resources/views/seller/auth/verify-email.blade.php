@extends('seller.layouts.parent')

@section('title', 'Verify Email')

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@push('links')
    @vite('resources/css/app.css')
@endpush

@section('content')
    @parent
    <div class="container shadow" style="margin-top: 100px; margin-bottom: 100px;" >
        <div class="m-auto w-75 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <div class="pt-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('seller.auth.verify_email.verify_email_head') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('seller.auth.verify_email.verify_email_confrmation') }}
                </div>
            @endif
            <form method="POST" action="{{ route('sellers.verification.send') }}">
                @csrf
                <button class="btn rounded-pill btn-dark w-50 mb-4 mt-5"> {{__('seller.auth.verify_email.confirm')}} </button>
            </form>
            <form method="POST" action="{{ route('sellers.logout') }}">
                @csrf

                <button class="btn rounded-pill btn-dark w-50 mb-4"> {{__('seller.auth.logout')}} </button>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('seller.layouts.partials.footer')
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush
