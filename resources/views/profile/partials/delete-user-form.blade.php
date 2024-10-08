<section class="profile__section">
    <header>
        <h2 class="title title--card">
            {{ __('Delete Account') }}
        </h2>

        <div class="profile__text">
            <p>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>
            <p>
                {{ __('Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>
    </header>

    <div>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Delete Account') }}</x-danger-button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="form">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <div class="profile__text">
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                    </p>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                </div>

                <div class="form__field">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
</section>
