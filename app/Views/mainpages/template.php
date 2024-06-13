<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ASTIKET</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/images/logos/astiket.png" />
    <link href="<?= base_url() ?>assets-game/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets-game/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-game/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-game/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-game/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-game/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-game/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets-game/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?= base_url('Main') ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url() ?>/assets/images/logos/astiket.png" width="40" alt="" />
                <span>ASTIKET</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link <?= (uri_string() == 'Home') ? 'active' : ''; ?>" href="<?= base_url('Main/index') ?>">Home</a></li>
                    <li><a class="nav-link <?= (uri_string() == 'Browse') ? 'active' : ''; ?>" href="<?= base_url('Main/browse') ?>">Browse</a></li>

                    <?php
                    $session = session();
                    if ($session->has('customer')) {
                        // Jika sudah login, tampilkan tautan "Tiket"
                    ?>
                        <li><a class="nav-link <?= (uri_string() == 'Tiket') ? 'active' : ''; ?>" href="<?= base_url('Main/tiket') ?>">Tiket</a></li>
                    <?php
                    }
                    ?>

                    <li><a class="nav-link <?= (uri_string() == 'contact') ? 'active' : ''; ?>" href="<?= base_url('Main/contact') ?>">Contact</a></li>

                    <?php if ($session->has('customer')) : ?>
                        <!-- Dropdown Profile hanya muncul jika pelanggan sudah login -->
                       
                        <li><a href="<?= base_url('User/logout') ?>">Logout</a></li>
                        <li class="dropdown" style="margin-left: 19px;"> <!-- Adjust the margin as needed -->
                            <img src="<?= base_url() ?>/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                            <ul>
                                <li><a href="#"><span><?= $session->get('customer'); ?></span></a></li>
                               
                            </ul>
                           
                        </li>
                    <?php else : ?>
                        <!-- Tautan "Get Started" muncul jika belum login -->
                        <li>
                            <a class="getstarted<?= (uri_string() == 'getstarted') ? 'active' : ''; ?>" href="<?= base_url('User/loginman') ?>">
                                Beli Tiket
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->


    <main id="main">
        <!-- ======= About Section ======= -->

        <?php echo view($content); ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Alaska Park Banjarbaru</h4>
                    <p>
                        <i class="bi bi-telephone"></i>+628048627824<br>
                        <i class="bi bi-envelope"></i> <a href="mailto:astiket@gmail.com" class="text-dark">astiket@gmail.com</a><br>
                        <i class="bi bi-geo-alt"></i> Jl. Sungai Abit, RT.27/RW.09, Cempaka<br>
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Navigasi</h4>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('Main/index') ?>">Home</a></li>
                        <li><a href="<?= base_url('Main/browse') ?>">Browser</a></li>
                        <li><a href="<?= base_url('Main/contact') ?>">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Informasi</h4>
                    <p>Selamat datang di Alaska Park Banjarbaru, tujuan wisata favorit untuk keluarga dan teman-teman. Kami menyediakan layanan pemesanan tiket secara online untuk memudahkan kunjungan Anda. Nikmati berbagai atraksi menarik dan pemandangan indah yang kami tawarkan. Jadikan momen Anda lebih berkesan bersama kami.</p>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets-game/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>assets-game/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets-game/js/main.js"></script>

</body>

</html>