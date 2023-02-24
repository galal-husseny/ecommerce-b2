<section class="shadow p-5" style="margin-top: 50px; margin-bottom: 50px">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('user.profile.delete_account.delete') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('user.profile.delete_account.delete_message') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="Password" />
                @if ($errors->userDeletion->get('password'))
                    <ul class='text-danger  space-y-1 mt-2'>
                        @foreach ($errors->userDeletion->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <button type='submit'
                    class='inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 m-t-30'>
                    Delete Accout
                </button>

            </div>
        </form>
    </x-modal>

    <button class="danger-button btn btn-danger rounded-pill" type="submit">
        {{ __('user.profile.delete_account.delete') }}
    </button>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', 'button.danger-button', function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2 rounded-pill',
                        cancelButton: 'btn btn-danger rounded-pill'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: "{{__('seller.profile.delete_account.title')}}",
                    text: "{{__('seller.profile.delete_account.text')}}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "{{__('seller.profile.delete_account.confirm_button_text')}}",
                    cancelButtonText: "{{__('seller.profile.delete_account.cancel_button_text')}}",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            "{{__('seller.profile.delete_account.deleted')}}",
                            "{{__('seller.profile.delete_account.deleted_text')}}",
                            'success'
                        )
                        $document.querySelector('form').submit();
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "{{__('seller.profile.delete_account.cancelled')}}",
                            "{{__('seller.profile.delete_account.cancelled_text')}}",
                            'error'
                        )
                    }
                })
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

