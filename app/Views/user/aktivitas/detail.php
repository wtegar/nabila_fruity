<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>">>
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                <h1 class="mb-4 mb-md-0 text-white text-uppercase"><?php echo lang('Blog.titleOurproducts');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?></h1>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-outline-primary"
                        href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?>></a>
                    <i class="fas fa-angle-double-right text-primary mx-2"></i>
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.headerProducts');  ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Start -->

<section class="site-section">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-8 blog-content">
                <h1 class="text-primary">
                    <b>
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo $tbaktivitas->nama_aktivitas_en;
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo $tbaktivitas->nama_aktivitas_in;
                        } ?>
                    </b>
                </h1>
                <p>
                    <?php if (lang('Blog.Languange') == 'en') {
                        echo $tbaktivitas->deskripsi_aktivitas_en;
                    } elseif (lang('Blog.Languange') == 'in') {
                        echo $tbaktivitas->deskripsi_aktivitas_in;
                    } ?>
                </p>
            </div>
            <div class="col-md-4 sidebar">
                <div class="sidebar-box">
                    <img data-src="/asset-user/images/<?= $tbaktivitas->foto_aktivitas ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                    echo $tbaktivitas->nama_aktivitas_en;
                                                                                                } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $tbaktivitas->nama_aktivitas_in;
                                    } ?>" class="img-fluid lazyload">
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>