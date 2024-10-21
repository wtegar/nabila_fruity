<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($profil as $perusahaan) : ?>
            <?php foreach ($tbslider as $key => $slider) : ?>
            <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                <img data-src="<?= base_url('asset-user/images/' . $slider->file_foto_slider); ?>"
                    alt="<?= $perusahaan->nama_perusahaan; ?>" class="lazyload w-100" style="object-fit: cover; height: 70vh;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <!-- Ganti konten caption di sini jika diperlukan -->
                </div>
            </div>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" role="button" data-slide="prev">
            <div class="btn btn-primary" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" role="button" data-slide="next">
            <div class="btn btn-primary" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->
