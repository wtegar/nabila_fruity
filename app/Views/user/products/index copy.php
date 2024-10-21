<?= $this->extend('user/template/template') ?>
<?= $this->extend('user/template/template') ?>
<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section site-blocks-cover innerpage"
    style="background-image: url('<?= base_url('asset-user/images/hero_4.jpg'); ?>">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <?php foreach ($profil as $perusahaan) : ?>
                <h1><?php echo lang('Blog.titleOurproducts');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?></h1>
                <?php endforeach; ?>
                <p class="text-white text-center">
                    <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php foreach ($tbproduk as $produk) : ?>
            <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
                <div class="blog-entry">
                    <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>"
                        class="img-link">
                        <img data-src="/asset-user/images/<?= $produk->foto_produk ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                    echo $produk->nama_produk_en;
                                                                                                } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>" class="img-fluid lazyload">
                    </a>
                    <div class="blog-entry-contents">
                        <h3 class="project-item-title">
                            <a
                                href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                <?php if (lang('Blog.Languange') == 'en') {
                                        echo $produk->nama_produk_en;
                                    } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>
                            </a>
                        </h3>
                        <!-- <div class="meta">Posted by <a href="#">Admin</a> In <a href="#">News</a></div> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- </div> -->

<?= $this->endSection('content'); ?>