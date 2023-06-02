@extends('admin.layouts.parent')

@section('title', __('admin.add_user.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('admin.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="col-12">
                    @include('seller.layouts.partials.errors')
                    <form method="POST" action="{{ route('admins.users.store') }}" id="form">
                        @csrf
                        <h4 class="mb-3">
                            {{ __('admin.add_user.create') }}
                        </h4>

                        <!-- Name -->
                        <div class=" mb-3 form-group">
                            <input class="form-control " id="name" type="text" name="name"
                                value="{{ old('name') }}" required autofocus placeholder="{{ __('user.auth.register.full_name') }}">
                        </div>

                        <!-- Email -->
                        <div class=" mb-3 form-group">
                            <input class="form-control" id="email" type="email" name="email"
                                value="{{ old('email') }}" required placeholder="{{ __('user.auth.register.email') }}">
                        </div>

                        <!-- Phone -->
                        <div class=" mb-3 form-group">
                            <input class="form-control" id="phone" type="number" name="phone" value="{{ old('phone') }}" required placeholder="{{ __('user.auth.register.phone_number') }}">
                        </div>

                        <!-- Password -->
                        <div class=" mb-3 form-group">
                            <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('user.auth.register.password') }}">
                        </div>

                        <!-- Confirm Password -->
                        <div class=" mb-3 form-group">
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" placeholder="{{ __('user.auth.register.confirm_password') }}">
                        </div>


                        <button class="button-general w-25 trans-04 pointer">
                            {{ __('user.auth.register.register') }}
                        </button>

                    </form>
                </div>
        </section>
    </div>

@endsection

@section('footer')
    @include('admin.layouts.partials.footer')
@endsection


