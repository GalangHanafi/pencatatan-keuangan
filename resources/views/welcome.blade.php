<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kantongku</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/src/assets/images/logos/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/src/assets/images/logos/favicon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing-page/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><b>Kantongku</b></a></h1>

            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- jika sudah login-->
                    @if (Auth::check())
                        <li><a class="getstarted" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up">
                    <div>
                        <h1>Kantongku</h1>
                        <h2>Kantongku adalah aplikasi manajemen keuangan pribadi yang dirancang untuk membantu Anda
                            mengelola pendapatan dan pengeluaran dengan mudah dan efisien. Dengan fitur-fitur canggih
                            namun user-friendly, Kantongku adalah solusi tepat untuk Anda yang ingin mencapai kestabilan
                            finansial.</h2>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img"
                    data-aos="fade-up">
                    <img src="{{ asset('landing-page/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= App Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title">
                    <h2>Fitur Aplikasi</h2>
                </div>

                <div class="row no-gutters">
                    <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
                        <div class="content d-flex flex-column justify-content-center">
                            <div class="row">
                                @foreach ($features as $item)
                                    <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                        <i class="{{ $item->icon }} display-6"></i>
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2"
                        data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('landing-page/assets/img/features.svg') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

            </div>
        </section><!-- End App Features Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ asset('landing-page/assets/img/details-1.png') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Kenapa Memilih KantongKu?</h3>
                        <p class="fst-italic">
                        </p>
                        <ul>
                            @foreach ($benefits as $item)
                                <li><i class="bi bi-check"></i>{{ $item->benefit }}</li>
                            @endforeach
                        </ul>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End Details Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Testimoni</h2>
                </div>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($ulasan as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <h3>{{ $item->name }}</h3>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $item->content }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            </div>
        </section>

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">

                    <h2>Pertanyaan yang Sering Diajukan (FAQ)</h2>
                </div>

                <div class="accordion-list">
                    <ul>
                        @foreach ($faqs as $faq)
                            <li data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                    class="collapse"
                                    data-bs-target="#accordion-list-{{ $faq->id }}">{{ $faq->question }}<i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-{{ $faq->id }}" class="collapse show"
                                    data-bs-parent=".accordion-list">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="main-footer container-fluid pt-4 pb-4" style="background-color: #f8f9fa;">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-comet"></i> Tentang Kami</h5>
                <p>Empower Your Financial Insights With Our Intuitive Accounting System - Simplifying Complexity,
                    Maximizing Efficiency.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-mailbox"></i> Kontak</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><i class="ti ti-mail"></i> Email: <a href="mailto:tes@accountingsystem.com"
                            style="text-decoration: none; color: #007bff;">tes@accountingsystem.com</a></li>
                    <li><i class="ti ti-phone"></i> Telepon: <a href="tel:+621234567890"
                            style="text-decoration: none; color: #007bff;">+62 123 456 7890</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-world"></i> Sosial Media</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><i class="ti ti-brand-facebook"></i> <a href="#"
                            style="text-decoration: none; color: #007bff;">Facebook</a></li>
                    <li><i class="ti ti-brand-twitter"></i> <a href="#"
                            style="text-decoration: none; color: #007bff;">Twitter</a></li>
                    <li><i class="ti ti-brand-instagram"></i> <a href="#"
                            style="text-decoration: none; color: #007bff;">Instagram</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy; 2024 Accounting System. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing-page/assets/js/main.js') }}"></script>


</body>

</html>
