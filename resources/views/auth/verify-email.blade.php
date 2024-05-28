<x-layouts.auth>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <p class="card-text">Thanks for signing up! Before getting started, could you verify
            your email address by clicking on the link we just emailed to you?</p>
        @if (session('status') == 'verification-link-sent')
            <p class="text-success fw-semibold">A new verification link has been sent to the email
                address you provided
                during registration.</p>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Resend Verification
                        Email</button>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-link position-fixed ">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</x-layouts.auth>
