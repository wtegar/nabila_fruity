<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1 class="mb-4 mb-md-0 text-white text-uppercase text-shadow"><?php echo lang('Blog.titleOurproducts');
                                                                                    if (!empty($perusahaan)) {
                                                                                        echo ' ' . $perusahaan->nama_perusahaan;
                                                                                    } ?></h1>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-outline-primary"
                        href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <i class="fas fa-angle-double-right text-primary mx-2"></i>
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.headerProducts');  ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Start -->

<!-- Projects Start -->
<div class="container-fluid py-5 cool_bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col text-center mb-4">
                <h1 class="mb-4 "><?php echo lang('Blog.btnOurproducts'); ?></h1>
                <hr style="border: 2px solid #333; width: 50%; margin: 10px auto;">
            </div>
        </div>
        <hr style="border: 1px solid #333; width: 50%; margin: 10px auto;">
        <hr style="border: 1px solid #333; width: 60%; margin: 10px auto;">
        <div class="d-flex justify-content-center flex-wrap mx-1 portfolio-container">
            <?php foreach ($tbproduk as $produk) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 p-2 portfolio-item">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'product' : 'produk') . '/' . ($lang === 'en' ? $produk->slug_en : $produk->slug_id)) ?>" class="position-relative overflow-hidden d-block">
                        <div class="portfolio-img d-flex align-items-center justify-content-center">
                            <img class="img-fluid"
                                src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>"
                                alt="<?php if (lang('Blog.Languange') == 'en') {
                                            echo $produk->nama_produk_en;
                                        } else if (lang('Blog.Languange') == 'in') {
                                            echo $produk->nama_produk_in;
                                        } ?>">
                        </div>

                        <div class="portfolio-text bg-secondary d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-white mb-4">
                                <?php if (lang('Blog.Languange') == 'en') {
                                    echo $produk->nama_produk_en;
                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $produk->nama_produk_in;
                                } ?>
                            </h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-shopping-cart text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Projects End -->

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
        /* Adjust the shadow as needed */
    }

    /* .section-title {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    background-color: #ffffff;
    border: 2px solid #007bff;
    border-radius: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 20px 0;

.section-title::before,
.section-title::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: #007bff;
    top: 50%;
    left: 0;
    z-index: -1;
}

.section-title::before {
    transform: translateY(-150%);
}

.section-title::after {
    transform: translateY(150%);
} */
</style>


<?= $this->endSection('content'); ?>