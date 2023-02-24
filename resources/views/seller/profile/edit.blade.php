@extends('seller.layouts.parent')

@section('title', __('seller.profile.profile'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('footer')
    @include('seller.layouts.partials.footer')
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush

@push('links')
    @vite('resources/css/app.css')
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
