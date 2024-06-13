<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantongku</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/styles.min.css') }}" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        {{ $slot }}
    </div>

    <script src="{{ asset('admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script>
        console.log('js nyambung');
        $(document).ready(function($) {
            $('.mask-money').maskMoney({
                allowNegative: false, // Tidak mengizinkan nilai negatif
                thousands: '.', // Pemisah ribuan
                precision: 0, // Jumlah digit desimal
            });
        });
    </script>
</body>

</html>
