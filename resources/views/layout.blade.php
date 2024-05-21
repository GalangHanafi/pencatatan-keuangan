<head>
    <!-- CSS library Tabler Icons -->
    <link href="https://cdn.tabler.io/tabler-icons/css/tabler-icons.min.css" rel="stylesheet">
    <!-- CSS untuk mengatur jarak antar paragraf -->
    <style>
        .main-footer h5 {
            margin-bottom: 0.5em; /* Jarak antara judul dan paragraf di bawahnya */
        }
        .main-footer p {
            margin-top: 0.5em; /* Jarak antara paragraf di bawah judul */
            margin-bottom: 0.5em; /* Jarak antara paragraf dan elemen di bawahnya */
        }
    </style>
</head>

<body>
    <header class="main-header">
        <!-- Header content -->
    </header>

    <div class="content">
        @yield('content')
    </div>

    @include('admin.includes.footer')

    <!-- Tambahkan JavaScript jika diperlukan -->
</body>
</html>
