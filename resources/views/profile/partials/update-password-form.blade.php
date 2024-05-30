<section>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title fw-semibold mb-4">
                Update Password
            </h2>

            <p>
                Ensure your account is using a long, random password to stay secure
            </p>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label class="form-label" for="update_password_current_password">Current password</label>
                    <input class="form-control" id="update_password_current_password" name="current_password"
                        type="password" class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="update_password_password">Password</label>
                    <input class="form-control" id="update_password_password" name="password" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="update_password_password_confirmation">Confirm Password</label>
                    <input class="form-control" id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
