<section class="shadow m-tb-50 p-3">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('user.profile.delete') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('user.profile.delete_message') }}
        </p>
    </header>
    <button class=" stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer text-lg-start" style = "font-size: 18px">
        {{ __('user.profile.delete') }}
    </button>
    <!-- <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('user.profile.delete') }}</x-danger-button> -->

    <!-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> -->
        <form method="post" action="{{ route('users.profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('user.profile.delete_confirm') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('user.profile.delete_message') }}
            </p>

            <div class="mt-6">
                <label for="password" value="Password" class="sr-only">
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="{{ __('user.auth.password') }}" />
                    @if ($errors->userDeletion->get('password'))
                        <ul class='text-danger  space-y-1 mt-2'>
                            @foreach ($errors->userDeletion->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif
            </div>

            <div class="mt-6 flex justify-end">
                <!-- <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('user.profile.cancel') }}
                </x-secondary-button> -->
                <button type = 'button' class = 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150' onclick="$dispatch('close')">
                    {{ __('user.profile.cancel') }}
                </button>

                <button type='submit'
                    class='inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 m-t-30'>
                    {{ __('user.profile.delete') }}
                </button>
            </div>
        </form>
    <!-- </x-modal> -->
</section>
