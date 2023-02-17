<section class="shadow m-t-120 p-10">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('messages.admin.profile.profile_info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('messages.admin.profile.message') }}
        </p>
    </header>

    <form method="post" action="{{ route('admins.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label for="name">{{ __('messages.admin.profile.name') }}</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @if ($errors->get('name'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->get('name') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <label for="email">{{ __('messages.admin.profile.email') }} </label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border"
                value="{{ old('email', $user->email) }}" required autocomplete="email" />
            @if ($errors->get('email'))
                <ul class='text-danger  space-y-1 mt-2'>
                    @foreach ($errors->get('email') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                </ul>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('messages.admin.profile.resend_verification_mail') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('messages.admin.profile.verification_message') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button
                class="stext-101 text-center cl0 w-25 bg-dark rounded-pill bor1 hov-btn3 p-lr-15 trans-04 pointer">{{ __('messages.admin.profile.save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('messages.admin.profile.saved') }}</p>
            @endif
        </div>
    </form>
</section>
