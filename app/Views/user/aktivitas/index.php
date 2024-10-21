<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1 class="mb-4 mb-md-0 text-white text-uppercase text-shadow">
                        <?php echo lang('Blog.titleActivities');
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
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.titleActivities');  ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Start -->

<!-- Projects Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col text-center mb-4">
                <!-- <h6 class="text-primary font-weight-normal text-uppercase mb-3">
                    <?php echo lang('Blog.titleActivities');
                    if (!empty($perusahaan)) {
                        echo ' ' . $perusahaan->nama_perusahaan;
                    } ?>
                </h6> -->
                <h1 class="mb-4"><?php echo lang('Blog.btnOurActivits');  ?></h1>
                <hr style="border: 2px solid #333; width: 50%; margin: 10px auto;">
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap mx-1 portfolio-container">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 p-2 portfolio-item">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'activities' : 'kegiatan') . '/' . ($lang === 'en' ? $aktivitas->slug_en : $aktivitas->slug_id))  ?>" class="position-relative overflow-hidden d-block">
                        <div class="portfolio-img d-flex align-items-center justify-content-center">
                            <img class="img-fluid"
                                src="<?= base_url('asset-user/images/' . $aktivitas->foto_aktivitas); ?>"
                                alt="<?php if (lang('Blog.Languange') == 'en') {
                                            echo $aktivitas->nama_aktivitas_en;
                                        } else if (lang('Blog.Languange') == 'in') {
                                            echo $aktivitas->nama_aktivitas_in;
                                        } ?>">
                        </div>

                        <div class="portfolio-text bg-secondary d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-white mb-4">
                                <?php if (lang('Blog.Languange') == 'en') {
                                    echo $aktivitas->nama_aktivitas_en;
                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $aktivitas->nama_aktivitas_in;
                                } ?>
                            </h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-eye text-white"></i>
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
</style>


<?= $this->endSection('content'); ?>