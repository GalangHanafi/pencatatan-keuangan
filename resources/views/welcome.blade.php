<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kantongku</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('landing-page/assets/img/Kantongku.png')}}" rel="icon">
    <link href="{{asset('landing-page/assets/img/icon.jpg')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('landing-page/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('landing-page/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('landing-page/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing-page/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing-page/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('landing-page/assets/css/style.css')}}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Appland
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><b>Kantongku</b></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- jika sudah login-->
                    @if (Auth::check())
                    <li><a class="getstarted" href="{{route('dashboard')}}">Dashboard</a></li>
                    @else
                    <li><a class="getstarted" href="{{route('login')}}">Login</a></li>
                    @endif

                    <!-- <li><a class="getstarted scrollto" href="#features">
                            {{ Auth::check() ? 'Dashboard' : 'Login'}}
                        </a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                    <div>
                        <h1>Kantongku</h1>
                        <h2>Kantongku adalah aplikasi manajemen keuangan pribadi yang dirancang untuk membantu Anda mengelola pendapatan dan pengeluaran dengan mudah dan efisien. Dengan fitur-fitur canggih namun user-friendly, Kantongku adalah solusi tepat untuk Anda yang ingin mencapai kestabilan finansial.</h2>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
                    <img src="{{asset('landing-page/assets/img/hero-img.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= App Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title">
                    <h2>App Features</h2>
                </div>

                <div class="row no-gutters">
                    <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
                        <div class="content d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Pelacakan Pengeluaran Otomatis.</h4>
                                    <p>Pantau setiap pengeluaran Anda tanpa ribet</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Anggaran Bulanan.</h4>
                                    <p>Buat dan kelola anggaran untuk berbagai kategori pengeluaran</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-time"></i>
                                    <h4>Pengingat Pembayaran.</h4>
                                    <p>Tidak perlu lagi khawatir terlambat bayar tagihan.</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bx bx-shield"></i>
                                    <h4>Keamanan Terjamin.</h4>
                                    <p>Data keuangan Anda aman dengan enkripsi tingkat tinggi</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bx bx-atom"></i>
                                    <h4>Laporan Keuangan.</h4>
                                    <p>Lihat laporan keuangan harian, mingguan, atau bulanan dengan visual yang mudah dipahami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{asset('landing-page/assets/img/features.svg')}}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section><!-- End App Features Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{asset('landing-page/assets/img/details-1.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Kenapa Memilih KantongKu?</h3>
                        <p class="fst-italic">
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Mudah Digunakan: Antarmuka yang user-friendly membuat siapa saja bisa menggunakan KantongKu tanpa kesulitan.</li>
                            <li><i class="bi bi-check"></i> Akses Kapan Saja, Di Mana Saja: Aplikasi tersedia di Android dan iOS, sehingga Anda bisa mengakses keuangan Anda di mana saja.</li>
                            <li><i class="bi bi-check"></i> Gratis: Nikmati semua fitur dasar tanpa biaya tambahan. Upgrade ke Premium untuk fitur lebih lanjut.</li>
                        </ul>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Gallery</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

            </div>

            <div class="container-fluid" data-aos="fade-up">
                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-1.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-1.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-2.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-2.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-3.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-3.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-4.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-4.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-5.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-5.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-6.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-6.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-7.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-7.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-8.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-8.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-9.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-9.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-10.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-10.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-11.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-11.png')}}" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="{{asset('landing-page/assets/img/gallery/gallery-12.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('landing-page/assets/img/gallery/gallery-12.png')}}" class="img-fluid" alt=""></a></div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Testimoni</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Siti, 30 tahun</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fitur budgetingnya luar biasa. Saya bisa mengatur pengeluaran bulanan saya dengan lebih baik dan melihat laporan keuangan saya dengan jelas. KantongKu benar-benar mengubah cara saya mengelola uang.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Budi, 35 tahun</h3>
                                <h4>Designer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    "Saya selalu kesulitan mengingat tanggal jatuh tempo tagihan. Dengan KantongKu, saya mendapat pengingat otomatis sehingga tidak pernah lagi telat bayar tagihan. Aplikasi ini sangat membantu!"
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Aulia,27 tahun</h3>
                                <h4>Pelajar</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    "KantongKu sangat membantu saya dalam mengatur keuangan sehari-hari. Saya jadi lebih disiplin dan tahu kemana uang saya pergi. Interface-nya juga sangat mudah digunakan!"
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3> Rudi, 40 tahun</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    "Aplikasi ini benar-benar user-friendly. Saya bukan orang yang sangat paham teknologi, tetapi saya bisa menggunakan KantongKu dengan mudah. Data keuangan saya juga terasa aman dan terlindungi."
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>Lina, 25 tahun</h3>
                                <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    "Dengan KantongKu, saya bisa melacak setiap transaksi yang saya lakukan, baik pengeluaran maupun pemasukan. Ini sangat membantu dalam merencanakan keuangan jangka panjang saya."
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
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

                    <h2>Frequently Asked Questions</h2>
                </div>

                <div class="accordion-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Bagaimana cara mendaftar di KantongKu? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                <p>
                                    Anda bisa mendaftar dengan mengunduh aplikasi KantongKu dari Google Play Store atau App Store, kemudian mengikuti langkah-langkah pendaftaran yang tersedia di aplikasi.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Apakah KantongKu gratis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Ya, KantongKu menawarkan fitur dasar secara gratis. Namun, kami juga menyediakan versi Premium dengan fitur tambahan yang bisa diakses dengan biaya berlangganan.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Bagaimana cara mencatat pengeluaran dan pemasukan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Setelah masuk ke dalam aplikasi, Anda bisa menambahkan transaksi baru dengan menekan tombol "Tambah Transaksi". Isi detail transaksi seperti jumlah, kategori, dan tanggal, lalu simpan.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed">Apakah data saya aman di KantongKu?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Kami menggunakan enkripsi tingkat tinggi untuk melindungi data Anda. Privasi dan keamanan data pengguna adalah prioritas utama kami.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed">Bagaimana cara mengatur anggaran bulanan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Anda bisa mengatur anggaran dengan masuk ke menu "Budgeting" di aplikasi. Tambahkan kategori anggaran yang ingin Anda kelola, tetapkan batas anggaran, dan pantau pengeluaran Anda agar tetap sesuai dengan anggaran.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6 info">
                                <i class="bx bx-map"></i>
                                <h4>Address</h4>
                                <p>A108 Adam Street,<br>New York, NY 535022</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-phone"></i>
                                <h4>Call Us</h4>
                                <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-envelope"></i>
                                <h4>Email Us</h4>
                                <p>contact@example.com<br>info@example.com</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-time-five"></i>
                                <h4>Working Hours</h4>
                                <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
                            <div class="form-group">
                                <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group mt-3">
                                <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group mt-3">
                                <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea placeholder="Message" class="form-control" name="message" rows="5" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="main-footer container-fluid pt-4 pb-4" style="background-color: #f8f9fa;">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-comet"></i> Tentang Kami</h5>
                <p>Empower Your Financial Insights With Our Intuitive Accounting System - Simplifying Complexity, Maximizing Efficiency.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-mailbox"></i> Kontak</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><i class="ti ti-mail"></i> Email: <a href="mailto:tes@accountingsystem.com" style="text-decoration: none; color: #007bff;">tes@accountingsystem.com</a></li>
                    <li><i class="ti ti-phone"></i> Telepon: <a href="tel:+621234567890" style="text-decoration: none; color: #007bff;">+62 123 456 7890</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5 style="font-weight: bold;"><i class="ti ti-world"></i> Sosial Media</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><i class="ti ti-brand-facebook"></i> <a href="#" style="text-decoration: none; color: #007bff;">Facebook</a></li>
                    <li><i class="ti ti-brand-twitter"></i> <a href="#" style="text-decoration: none; color: #007bff;">Twitter</a></li>
                    <li><i class="ti ti-brand-instagram"></i> <a href="#" style="text-decoration: none; color: #007bff;">Instagram</a></li>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('landing-page/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing-page/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('landing-page/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing-page/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('landing-page/assets/js/main.js')}}"></script>


</body>

</html>