<section class="space-y-6">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title fw-semibold mb-4">
                Delete User
            </h2>

            <p>
                Once your user is deleted, all of its resources and data will be permanently deleted. Before deleting
                your user, please download any data or information that you wish to retain
            </p>
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal">{{ __('Delete User') }}</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            <div class="modal-body">
                                @csrf
                                @method('delete')

                                <h2>
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div>
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        class="mt-1 block w-full" autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
