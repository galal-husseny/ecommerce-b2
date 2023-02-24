<section class="m-t-150 container p-3 border border-3 border-grey">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('user.profile.profile_info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('user.profile.message') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('users.verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('users.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{old('name', $user->name)}}" required autofocus autocomplete="name"  />
                @if ($errors->get('name'))
                    <ul class='text-danger  space-y-1 mt-2'>
                        @foreach ($errors->get('name') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif
        </div>

        <!-- Email -->
        <div>
            <input id="email" name="email" type="email" class="mt-1 block w-full" value="{{old('email', $user->email)}}" required autocomplete="email" />
                @if ($errors->get('email'))
                    <ul class='text-danger  space-y-1 mt-2'>
                        @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('user.profile.email_unverified') }}

                        <button form="send-verification" class="stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            {{ __('user.profile.resend_verification_mail') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('user.profile.verification_message') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="stext-101 cl0 w-25 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">{{ __('user.profile.verification_message') }}</button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success" role="alert">
                {{ __('user.profile.saved') }}
                </div>
            @endif
        </div>
    </form>
</section>

