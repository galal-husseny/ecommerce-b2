
@extends('user.layouts.parent')

@section('title' , 'Profile')

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('content')
@parent
<div class="container" style="width: 90%;">

    @include('user.profile.partials.update-profile-information-form')

    @include('user.profile.partials.update-password-form')

    @include('user.profile.partials.delete-user-form')
</div>
@endsection
