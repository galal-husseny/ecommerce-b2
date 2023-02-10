{{-- <x-app-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('seller.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('seller.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('seller.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-seller-layout> --}}

@extends('seller.layouts.parent')

@section('title' , 'Profile')

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('footer')
    @include('seller.layouts.partials.footer')
@endsection

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@endpush

@push('links')
<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@section('content')
    @parent

    <div class="container" style="width: 90%">
        @include('seller.profile.partials.update-profile-information-form')

        @include('seller.profile.partials.update-password-form')

        @include('seller.profile.partials.delete-user-form')
    </div>
@endsection
