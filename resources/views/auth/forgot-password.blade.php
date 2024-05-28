<x-layouts.auth>
    <p class="card-text py-2">
        Enter your email address and we'll send you an email with instructions to reset
        your password.
    </p>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="post" action="{{ route('password.email') }}">
        @csrf
        <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="typeEmail">Email input</label>
            <input type="email" id="typeEmail" name="email" class="form-control my-3" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <button type="submit" data-mdb-ripple-init class="btn btn-primary w-100">Reset
            password</button>
    </form>
</x-layouts.auth>
