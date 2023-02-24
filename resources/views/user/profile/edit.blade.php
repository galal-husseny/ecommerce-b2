@extends('user.layouts.parent')

@section('title', __('user.profile.profile'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
    @vite('resources/css/app.css')
@endpush

@section('content')
    @parent
    <div class="container">

        @include('user.profile.partials.update-profile-information-form')

        @include('user.profile.partials.update-password-form')

        @include('user.profile.partials.delete-user-form')
    </div>
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush
