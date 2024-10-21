<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <h1 class="mb-4 mb-md-0 text-white text-uppercase text-shadow"><?php echo lang('Blog.titleAboutUs'); ?></h1>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-outline-primary" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a>
                    <i class="fas fa-angle-double-right text-primary mx-2"></i>
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.headerAbout'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Start -->

<!-- About Start -->
<div class="container-fluid bg-light pt-5">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row">
            <div class="col-lg-5">
    <div class="d-flex flex-column align-items-center justify-content-center bg-primary h-100 py-5 px-3">
        <img src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>" 
             alt="<?= isset($profil[0]) ? $profil[0]->nama_perusahaan : 'Gambar Perusahaan'; ?>" 
             class="img-fluid img-overlap">
    </div>
</div>
                <div class="col-lg-7 m-0 my-lg-5 pt-5 pb-5 pb-lg-2 pl-lg-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col  mb-4">
                            <h2 class="mb-4"><?php echo lang('Blog.titleAboutUs'); ?></h2>
                            <hr style="border: 2px solid #333; width: 100%; margin: 10px auto;">
                        </div>
                    </div>
                    <h1 class="mb-4 section-title"><?= $descper->nama_perusahaan; ?></h1>
                    <p>
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo $descper->deskripsi_perusahaan_en;
                        } ?>
                        <?php if (lang('Blog.Languange') == 'in') {
                            echo $descper->deskripsi_perusahaan_in;
                        } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); /* Adjust the shadow as needed */
    }
</style>

<?= $this->endSection('content'); ?>