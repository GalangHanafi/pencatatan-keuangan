<section>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Photo</h5>
            <p>Update your photo profil.</p>

            <form method="post" action="{{ route('profile.update.photo') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="photo" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" required>
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
            @if( $user->photo != 'storage/photos/default.jpg')

            <form method="post" action="{{ route('profile.update.photo') }}" class="mt-6 space-y-6">
                @csrf
                @method('delete')

                <x-primary-button class='btn-danger'>{{ __('Delete') }}</x-primary-button>


            </form>
            @endif
        </div>
    </div>
</section>