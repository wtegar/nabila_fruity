<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1 class="mb-4 mb-md-0 text-white text-uppercase text-shadow"><?php echo lang('Blog.titleOurarticle');
                                                                                    if (!empty($perusahaan)) {
                                                                                        echo ' ' . $perusahaan->nama_perusahaan;
                                                                                    } ?></h1>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-outline-primary" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a>
                    <i class="fas fa-angle-double-right text-primary mx-2"></i>
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.headerArticle'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col text-center mb-4">
                <h1 class="mb-4"><?php echo lang('Blog.btnOurArticles'); ?></h1>
                <hr style="border: 2px solid #333; width: 50%; margin: 10px auto;">
            </div>
        </div>
        <hr style="border: 1px solid #333; width: 50%; margin: 10px auto;">
        <hr style="border: 1px solid #333; width: 60%; margin: 10px auto;">

        <br>
        <div class="row justify-content-center">
            <?php foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'article' : 'artikel') . '/' . ($lang === 'en' ? $row->slug_en : $row->slug_id)) ?>" class="text-decoration-none text-dark">
                        <div class="position-relative d-flex flex-column h-100 mb-3 article-card">
                            <img class="img-fluid w-100 rounded-top" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                            <div class="bg-light-gray border border-top-0 p-4 flex-grow-1 rounded-bottom">
                                <div class="mb-2">
                                    <p><?= date('d F Y', strtotime($row->created_at)); ?></p>
                                </div>
                                <!-- Kondisi untuk menampilkan judul berdasarkan bahasa -->
                                <h4 class="display-5">
                                    <?= $lang === 'id' ? substr(strip_tags($row->judul_artikel), 0, 20) : substr(strip_tags($row->judul_artikel_en), 0, 20); ?>...
                                </h4>
                                <p>
                                    <?= $lang === 'id' ? substr(strip_tags($row->deskripsi_artikel), 0, 50) : substr(strip_tags($row->deskripsi_artikel_en), 0, 50); ?>...
                                </p>

                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
        /* Adjust the shadow as needed */
    }

    .bg-light-gray {
        background-color: #f0f0f0;
        /* Warna abu-abu */
    }

    .article-card:hover .bg-light-gray {
        background-color: #dcdcdc;
        /* Warna abu-abu lebih gelap saat hover */
    }

    .article-card {
        transition: transform 0.3s ease;
        border-radius: 10px;
        /* Membuat sudut melengkung */
    }

    .article-card:hover {
        transform: translateY(-10px);
        /* Efek hover mengangkat kartu */
    }

    .rounded-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .rounded-bottom {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .container .row {
        justify-content: center;
    }

    .text-decoration-none {
        text-decoration: none;
    }

    .text-dark {
        color: #000;
    }
</style>
<?= $this->endSection('content'); ?>