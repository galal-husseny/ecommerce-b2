@extends('seller.layouts.parent')

@section('title', 'Index')

@section('content')
    @parent


    <div class="bg-index d-flex flex-column justify-content-center ">
        <div class="row justify-content-center ">
            <h2 class="fw-bold text-dark col-4">
                {{ __('messages.seller.index.message') }}
            </h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container h-full d-flex justify-content-between align-items-center bg-transpernet ">
                <div class="shadow p-4  " style="width: 45%">
                    <h3 class="text-dark fw-bolder my-4">
                        {{ __('messages.seller.index.have_account') }}
                    </h3>
                    <a href="{{ route('sellers.login') }}" class="btn btn-dark border rounded-pill w-50 m-l-auto">
                        {{__('messages.seller.auth.Log_in')}}
                    </a>
                </div>

                <div class="shadow p-4 " style="width: 45%">
                    <h3 class="text-dark my-4">
                        {{ __('messages.seller.index.dont_have_account') }}
                    </h3>
                    <a href="{{ route('sellers.register') }}" class="btn btn-dark border rounded-pill w-50 m-l-auto">
                        {{ __('messages.seller.auth.register') }}
                    </a>
                </div>
            </div>
        </div>

    @endsection
