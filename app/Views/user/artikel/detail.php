<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<style>
    .article-title {
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 100%;
    }

    .article-item {
        display: flex;
        height: 110px;
        /* Tinggi card sesuai dengan tinggi gambar */
        overflow: hidden;
        /* Sembunyikan overflow */
    }

    .article-image {
        width: 110px;
        height: 110px;
        object-fit: cover;
    }

    .article-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex: 1;
        padding: 0 1rem;
        white-space: normal;
        /* Izinkan teks membungkus ke baris berikutnya */
        overflow: hidden;
        /* Sembunyikan overflow yang tidak perlu */
        text-overflow: ellipsis;
        /* Tambahkan ellipsis pada teks yang terlalu panjang */
    }
</style>

<div class="container-fluid py-5" style="background-image: url('<?= base_url('./asset-user/images/hero_1.jpg'); ?>');">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1 class="mb-4 mb-md-0 text-white text-uppercase">
                        <?php echo lang('Blog.titleOurarticle');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                    </h1>
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
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikel->foto_artikel); ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikel->created_at)); ?></a>
                        </div>

                        <!-- Kondisi untuk menampilkan judul dan deskripsi berdasarkan bahasa -->
                        <?php if ($lang === 'id') : ?>
                            <h1 class="display-5 mb-2 article-title"><?= $artikel->judul_artikel; ?></h1>
                            <p class="fs-5"><?= $artikel->deskripsi_artikel; ?></p>
                        <?php else : ?>
                            <h1 class="display-5 mb-2 article-title"><?= $artikel->judul_artikel_en; ?></h1>
                            <p class="fs-5"><?= $artikel->deskripsi_artikel_en; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>


            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Baca Juga</h5>
                    </div>
                    <br>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($artikel_lain as $artikel_item) : ?>
                            <div class="d-flex align-items-center bg-white mb-3 article-item">
                                <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" alt="">
                                <div class="w-100 h-100 d-flex flex-column justify-content-center border border-left-0 article-content">
                                    <div class="mb-2">
                                        <a class="text-body" href="<?= base_url($lang . '/' . ($lang === 'en' ? 'article' : 'artikel') . '/' . ($lang === 'en' ? $artikel_item->slug_en : $artikel_item->slug_id)) ?>">
                                            <small><?= date('d F Y', strtotime($artikel_item->created_at)); ?></small>
                                        </a>
                                    </div>

                                    <!-- Kondisi untuk menampilkan judul berdasarkan bahasa -->
                                    <a class="h6 m-0 display-7" href="<?= base_url($lang . '/' . ($lang === 'en' ? 'article' : 'artikel') . '/' . ($lang === 'en' ? $artikel_item->slug_en : $artikel_item->slug_id)) ?>">
                                        <?= $lang === 'id' ? substr($artikel_item->judul_artikel, 0, 20) : substr($artikel_item->judul_artikel_en, 0, 20); ?>...
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- Popular News End -->
            </div>


            <!-- Popular News End -->
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->

<?= $this->endSection('content'); ?>