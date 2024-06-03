<section>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Profile Information</h5>
            <p>Update your account's profile information and email address.</p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="name" id="name" required
                        value="{{ old('name', $user->name) }}" autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" required
                        value="{{ old('phone', $user->phone) }}" autofocus autocomplete="phone">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required
                        value="{{ old('address', $user->address) }}" autofocus autocomplete="address">
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required
                        value="{{ old('email', $user->email) }}" autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="mt-2">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="btn btn-link m-1">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="fw-semibold text-success ">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
        </div>
    </div>
</section>
