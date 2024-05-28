<x-layouts.auth>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input name="remember" class="form-check-input primary" type="checkbox" id="flexCheckChecked" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remeber this Device
                </label>
            </div>
            <a class="text-primary fw-bold" href="{{ route('password.request') }}">Forgot
                Password ?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
            In</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">New to Kantongku?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an
                account</a>
        </div>
    </form>
</x-layouts.auth>
