<section class="shadow p-5" style="margin-top: 50px">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('seller.profile.update_password.update_password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('seller.profile.update_password.update_password_message') }}
        </p>
    </header>

    <form method="post" action="{{ route('sellers.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="d-block"> {{__('seller.profile.update_password.current_password')}} </label>
            <input id="current_password" name="current_password" type="password" class="mt-1 w-75 border form-control" autocomplete="current-password" />
            @if ($errors->updatePassword->get('current_password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-3">
            <label for="password" class="d-block"> {{__('seller.profile.update_password.new_password')}} </label>
            <input id="password" name="password" type="password" class="mt-1 block w-75 border form-control"
                autocomplete="new-password" />
            @if ($errors->updatePassword->get('password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-3">
            <label for="password_confirmation" class="d-block"> {{__('seller.profile.update_password.confirm_password')}} </label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 w-75 border form-control" autocomplete="new-password" />
            @if ($errors->updatePassword->get('password_confirmation'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class=" text-center w-25 bg-dark rounded-pill mt-5">{{__('seller.profile.update_info.save')}}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('seller.profile.saved') }}</p>
            @endif
        </div>
    </form>
</section>
