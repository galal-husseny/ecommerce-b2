<section class="shadow p-5" style="margin-top: 50px">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('user.profile.delete_account.delete') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('user.profile.delete_account.delete_message') }}
        </p>
    </header>

    <form method="post" action="{{ route('users.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password"> {{__('user.profile.delete_account.current_password')}} </label>
            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full p-2 border"
                autocomplete="current-password" />
            @if ($errors->updatePassword->get('current_password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-2">
            <label for="password"> {{__('user.profile.delete_account.new_password')}} </label>
            <input id="password" name="password" type="password" class="mt-1 block w-full p-2 border"
                autocomplete="new-password" />
            @if ($errors->updatePassword->get('password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-2">
            <label for="password_confirmation"> {{__('user.profile.delete_account.confirm_password')}} </label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            @if ($errors->updatePassword->get('password_confirmation'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="text-center w-25 btn btn-dark rounded-pill mt-5">{{ __('user.profile.delete_account.delete') }}</button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success" role="alert">
                {{ __('user.profile.saved') }}
                </div>
            @endif
        </div>
    </form>
</section>
