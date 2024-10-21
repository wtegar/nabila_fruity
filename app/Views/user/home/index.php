<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>

<!-- About Start -->
<div class="container-fluid bg-light pt-2">
    <div class="container">
        <?php foreach ($profil as $title) : ?>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_title text-center mb_70">
                        <h1 class="my-5"><?= $title->title_website; ?></h1>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($profil as $descper) : ?>
            <div class="row">
                <div class="col-lg-7 m-0 my-lg-5 pt-5 pb-5 pb-lg-2 pr-lg-5">
                    <h3 class="text-primary font-weight-normal text-uppercase mb-3">
                        <?php echo lang('Blog.titleAboutUs')  ?></h3>
                    <h1 class="mb-2 section-title"><?= $descper->nama_perusahaan; ?></h1>
                    <p><?php if (lang('Blog.Languange') == 'en') {
                            echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                        } ?>
                        <?php if (lang('Blog.Languange') == 'in') {
                            echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                        } ?></p>
                    <div class="text-center mt-5">
                        <div class="btn btn-secondary rounded-pill px-5 py-3 text-white">
                            <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'about' : 'tentang-kami')) ?>" class="text-white">
                                <?= lang('Blog.btnReadmore'); ?>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center bg-primary h-100 py-5 px-3">
                        <img src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>"
                            alt="<?= isset($profil[0]) ? $profil[0]->nama_perusahaan : 'Gambar Perusahaan'; ?>"
                            class="img-fluid img-overlap">
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About Ends -->

<div class="container-fluid bg-primary">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col text-center mb-4">
                <h3 class="text-black font-weight-normal text-uppercase mb-3">
                    <?php echo lang('Blog.btnOurproducts'); ?>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center mx-1 portfolio-container">
            <?php
            $count = 0; // Variable to count items
            foreach ($tbproduk as $produk) : ?>
                <?php if ($count < 3) : ?>
                    <!-- Show only the first 3 items -->
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 p-2 portfolio-item">
                        <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'product' : 'produk') . '/' . ($lang === 'en' ? $produk->slug_en : $produk->slug_id)) ?>" class="position-relative overflow-hidden text-decoration-none d-block">
                            <div class="portfolio-img d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                    echo $produk->nama_produk_en;
                                                                                                                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
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
                    <?php $count++; // Increment the count after displaying an item 
                    ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <div class="btn btn-secondary rounded-pill px-5 py-3 text-white">
                <a href="<?= base_url('product') ?>"><?php echo lang('Blog.btnOurproducts'); ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->

<!-- Contact Section Start -->
<section class="contact-section">
    <div class="container p-5">
        <div class="d-flex flex-column text-center mb-5">
            <h3 class="text-primary font-weight-normal text-uppercase mb-3"><?php echo lang('Blog.ContactDesc'); ?></h3>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="map">
                    <?php foreach ($profil as $maps) : ?>
                        <?= $maps->link_maps ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card shadow-sm p-3">
                    <div class="card-body text-center">
                        <?php foreach ($profil as $desc) : ?>
                            <blockquote class="blockquote text-primary">
                                <i class="fa-lg mb-3" aria-hidden="true"></i>
                                <p class="mb-0" style="font-size: 1.2rem;">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $desc->deskripsi_kontak_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $desc->deskripsi_kontak_in;
                                    } ?>
                                </p>
                            </blockquote>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<style>
    .section_title {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .cool_bg {
        background-color: #D8AF5D;
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }

    .title-with-line {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        background-color: #ffffff;
        border-radius: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 20px 0;
    }

    .title-with-line::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #007bff;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .map {
        width: 100%;
        height: 400px;
        border-radius: 15px;
        overflow: hidden;
    }

    .card {
        border-radius: 15px;
        max-width: 500px;
        margin: auto;
    }

    .card-body {
        padding: 1.5rem;
    }

    .blockquote {
        font-size: 1.2rem;
        text-align: center;
    }

    .fa-map-marker-alt {
        color: #3684c6;
        display: block;
        margin: auto;
    }

    .social-icons a {
        color: #3684c6;
    }

    .social-icons a:hover {
        color: #0056b3;
    }

    .social-icons .fa {
        margin: 15px;
    }
</style>

<?= $this->endSection('content') ?>