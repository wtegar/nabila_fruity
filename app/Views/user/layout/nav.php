<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-fluid position-relative" style="z-index: 9; padding-left: 0; padding-right: 0;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 px-3">
            <?php foreach ($profil as $header) :  ?>
                <a href="<?= base_url('/') ?>" class="navbar-brand ml-3">
                    <img src="<?= base_url('asset-user/images/'); ?><?= $header->logo_perusahaan ?>"
                        alt="<?= $header->nama_perusahaan ?>" class="img-fluid logo-img" style="height: 80px; width:80px;">
                </a>
            <?php endforeach;  ?>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <?php
                    // Ambil bahasa yang disimpan di session
                    $lang = session()->get('lang') ?? 'en'; // Default ke 'en' jika tidak ada di session

                    $current_url = uri_string();

                    // Simpan segmen bahasa saat ini
                    $lang_segment = substr($current_url, 0, strpos($current_url, '/') + 1); // Menyimpan 'id/' atau 'en/'

                    // Definisikan tautan untuk setiap halaman berdasarkan bahasa
                    $aboutLink = ($lang_segment === 'en/') ? 'about' : 'tentang-kami';
                    $articleLink = ($lang_segment === 'en/') ? 'article' : 'artikel';
                    $productLink = ($lang_segment === 'en/') ? 'product' : 'produk';
                    $activitiesLink = ($lang_segment === 'en/') ? 'activities' : 'kegiatan';
                    $contactLink = ($lang_segment === 'en/') ? 'contact' : 'kontak';

                    // Buat array untuk menggantikan segmen berdasarkan bahasa
                    $replace_map = [
                        'tentang-kami' => 'about',
                        'artikel' => 'article',
                        'produk' => 'product',
                        'kegiatan' => 'activities',
                        'kontak' => 'contact'
                    ];

                    // Ambil bagian dari URL tanpa segmen bahasa
                    $url_without_lang = substr($current_url, strlen($lang_segment));

                    // Tentukan bahasa yang ingin digunakan
                    $new_lang_segment = ($lang_segment === 'en/') ? 'id/' : 'en/';

                    // Gantikan setiap segmen dalam URL berdasarkan bahasa yang aktif
                    foreach ($replace_map as $indonesian_segment => $english_segment) {
                        if ($lang_segment === 'en/') {
                            // Jika bahasa yang dipilih adalah 'en', maka ganti segmen ID ke EN
                            $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
                        } else {
                            // Jika bahasa yang dipilih adalah 'id', maka ganti segmen EN ke ID
                            $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
                        }
                    }

                    // Tautan dengan bahasa yang baru
                    $clean_url = $new_lang_segment . ltrim($url_without_lang, '/');

                    // Tautan Bahasa Inggris
                    $english_url = base_url($clean_url);

                    // Tautan Bahasa Indonesia
                    $indonesia_url = base_url($clean_url);
                    ?>


                    <!-- Link navigasi dengan bahasa yang sedang aktif -->
                    <a href="<?= base_url($lang . '/') ?>" class="nav-item nav-link <?= uri_string() == '' ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerHome'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $aboutLink) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerAbout'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $articleLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $articleLink) || strpos(uri_string(), $lang . '/' . $articleLink . '/detail') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerArticle'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $productLink) || strpos(uri_string(), $lang . '/' . $productLink . '/detail') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerProducts'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $activitiesLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $activitiesLink) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerActivities'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $contactLink) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerContact'); ?>
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link drop" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo lang('Blog.headerLanguage'); ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="navbarDropdown">
                            <!-- Pastikan untuk tidak menumpuk segment bahasa -->
                            <!-- Pastikan untuk tidak menumpuk segment bahasa -->
                            <a class="dropdown-item" href="<?= $english_url ?>">English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= $indonesia_url ?>">Indonesia</a>

                        </div>
                    </div>
                              
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<style>
    .nav-bar {
        background-color: #343a40;
        /* Warna latar belakang navbar */
        padding-left: 0;
        padding-right: 0;
    }

    .navbar {
        margin-left: 0;
        margin-right: 0;
        width: 100%;
    }

    .navbar-brand {
        margin-left: 1.5rem;
        /* Menambah jarak logo dari sisi kiri */
    }

    .navbar-nav .nav-link {
        margin-left: 15px;
        margin-right: 15px;
        color: #ffffff;
        /* Warna teks */
        text-transform: uppercase;
        /* Mengubah teks menjadi huruf kapital */
        position: relative;
    }

    .navbar-nav .nav-link::after {
        content: "";
        display: block;
        width: 0;
        height: 3px;
        /* Garis bawah lebih tebal */
        background: #ffc107;
        transition: width 0.3s, background-color 0.3s;
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
        width: 100%;
    }

    .navbar-nav .nav-link.active {
        color: #ffc107;
        /* Warna teks saat link aktif */
    }

    .dropdown-menu {
        background-color: #343a40;
        /* Warna latar belakang dropdown */
    }

    .dropdown-item {
        color: #ffffff;
        /* Warna teks dropdown */
    }

    /* .dropdown-item:hover {
    background-color: #495057; 
} */
</style>