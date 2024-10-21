<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <?php foreach ($profil as $perusahaan) : ?>
        <link rel="shortcut icon" href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>">
    <?php endforeach; ?>

    <title>
        <?=
        session()->get('lang') == 'id'
            ? ($tbproduk->meta_title ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta->meta_title ?? 'Judul Standar Bahasa Indonesia')
            : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta->meta_title_en ?? 'Default English Title');
        ?>
    </title>

    <!-- Meta Tags -->
    <meta name="title" content="<?=
                                session()->get('lang') == 'id'
                                    ? ($tbproduk->meta_title ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta->meta_title ?? 'Judul Standar Bahasa Indonesia')
                                    : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta->meta_title_en ?? 'Default English Title');
                                ?>">
    <meta name="description" content="<?=
                                        session()->get('lang') == 'id'
                                            ? ($tbproduk->meta_description ?? $tbaktivitas->meta_description_id ?? $artikel->meta_description_id ?? $meta->meta_description ?? 'Deskripsi Standar Bahasa Indonesia')
                                            : ($tbproduk->meta_description_en ?? $tbaktivitas->meta_description_en ?? $artikel->meta_description_en ?? $meta->meta_description_en ?? 'Default English Description');
                                        ?>">

    <!-- Canonical Tag -->
    <link rel="canonical" href="<?= $canonicalUrl ?? base_url() ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="<?= base_url('asset-user') ?>/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1003f66bc0.js" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('asset-user') ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3">
        <div class="container">

        </div>
    </div>
    <!-- Topbar End -->
    <?= $this->include('user/layout/nav'); ?>

    <?= $this->include('user/layout/header'); ?>

    <!-- render halaman konten -->
    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <?= $this->include('user/layout/footer'); ?>

    <?php foreach ($profil as $iconwa) : ?>
        <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="_blank">
            <img data-src="<?= base_url('asset-user/images/wa-logo.png'); ?>" alt="WhatsApp" class="my-float lazyload">
        </a>
    <?php endforeach; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
        $(document).ready(function() {
            // Menginisialisasi carousel
            $('#header-carousel').carousel({
                interval: 3000 // Ganti 5000 dengan interval yang Anda inginkan (dalam milidetik)
            });

            // Menggunakan tombol next dan previous
            $('#header-carousel a.carousel-control-prev').click(function() {
                $('#header-carousel').carousel('prev');
            });
            $('#header-carousel a.carousel-control-next').click(function() {
                $('#header-carousel').carousel('next');
            });
        });
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= base_url('asset-user') ?>/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('asset-user') ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery-ui.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/aos.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.sticky.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/main.js"></script>

</body>

</html>