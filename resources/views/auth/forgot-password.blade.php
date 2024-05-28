<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('admin/src/assets/images/logos/dark-logo.svg') }}" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Your Social Campaigns</p>
                                <form method="post" action="{{ route('password.email') }}" class="card-body px-5">
                                    @csrf
                                    <p class="card-text py-2">
                                        Enter your email address and we'll send you an email with instructions to reset
                                        your password.
                                    </p>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="typeEmail">Email input</label>
                                        <input type="email" id="typeEmail" name="email" class="form-control my-3" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <button type="submit" data-mdb-ripple-init class="btn btn-primary w-100">Reset
                                        password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
