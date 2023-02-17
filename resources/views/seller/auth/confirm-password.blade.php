@extends('seller.layouts.parent')

@section('title', 'Confirm Password')

@section('content')
    @parent
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('messages.seller.auth.confirm_password_title') }}
    </div>

    <form method="POST" action="{{ route('sellers.password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password"> {{ __('messages.seller.auth.Password') }} </label>

            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <button class="btn btn-primary w-50 rounded-pill">
                {{ __('messages.seller.auth.confirm') }}
            </button>
        </div>
    </form>
@endsection
