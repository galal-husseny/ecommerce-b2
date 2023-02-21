@extends('seller.layouts.parent')

@section('title', 'Confirm Password')

@section('content')
    @parent
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('seller.auth.confirm_password_title') }}
    </div>

    <form method="POST" action="{{ route('sellers.password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password"> {{ __('seller.auth.login.password') }} </label>

            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password">

                @if ($errors->get('password'))
                <ul class = 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                    @foreach ($errors->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex justify-end mt-4">
            <button class="btn btn-primary w-50 rounded-pill">
                {{ __('seller.auth.verify_email.confirm') }}
            </button>
        </div>
    </form>
@endsection
