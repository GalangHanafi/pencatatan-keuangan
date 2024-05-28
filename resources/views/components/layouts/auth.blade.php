<x-layouts.app>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('welcome') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('admin/src/assets/images/logos/kantongku.png') }}" width="180"
                                    alt="">
                            </a>
                            <p class="text-center">Your Social Campaigns</p>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
