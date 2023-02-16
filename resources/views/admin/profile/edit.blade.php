@extends('admin.layouts.parent')

@section('title', 'Profile')

@section('header')
    @include('admin.layouts.partials.header')
@endsection

@section('footer')
    @include('admin.layouts.partials.footer')
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
        @include('admin.profile.partials.update-profile-information-form')

        @include('admin.profile.partials.update-password-form')
    </div>
@endsection
