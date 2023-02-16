<section class="shadow m-tb-50 p-10" style="margin-top: 50px; margin-bottom: 50px">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('messages.admin.profile.update_password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('messages.admin.profile.update_password_message') }}
        </p>
    </header>

    <form method="post" action="{{ route('admins.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password"> {{ __('messages.admin.profile.current_password') }} </label>
            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border" autocomplete="current-password" />
            @if ($errors->updatePassword->get('current_password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <label for="password"> {{ __('messages.admin.profile.new_password') }} </label>
            <input id="password" name="password" type="password" class="mt-1 block w-full border"
                autocomplete="new-password" />
            @if ($errors->updatePassword->get('password'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <label for="password_confirmation"> {{ __('messages.admin.profile.confirm_password') }} </label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full border" autocomplete="new-password" />
            @if ($errors->updatePassword->get('password_confirmation'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button
                class="stext-101 text-center cl0 w-25 bg-dark rounded-pill bor1 hov-btn3 p-lr-15 trans-04 pointer">{{ __('messages.admin.profile.save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('messages.admin.profile.save') }}</p>
            @endif
        </div>
    </form>
</section>
