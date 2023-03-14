@extends('seller.layouts.parent')

@section('title', __('seller.index.title'))

@section('content')
    @parent

    <div class="bg-index d-flex flex-column justify-content-center ">
        <div class="row justify-content-center ">
            <h2 class="fw-bold text-dark col-4">
                {{ __('seller.index.message') }}
            </h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container h-full d-flex justify-content-between align-items-center bg-transpernet ">
                <div class="shadow p-4  " style="width: 45%">
                    <h3 class="text-dark text-center my-4">
                        {{ __('seller.index.have_account') }}
                    </h3>
                    <a href="{{ route('sellers.login') }}" class="button-general w-50 m-l-auto">
                        {{__('seller.auth.login.login')}}
                    </a>
                </div>

                <div class="shadow p-4 " style="width: 45%">
                    <h3 class="text-dark text-center my-4">
                        {{ __('seller.index.dont_have_account') }}
                    </h3>
                    <a href="{{ route('sellers.register') }}" class="button-general w-50 ml-auto">
                        {{ __('seller.auth.register.register') }}
                    </a>
                </div>
            </div>
        </div>

    @endsection
