<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1 class="mb-4 mb-md-0 text-white text-uppercase text-shadow">
                        <?php echo lang('Blog.titleOurContact');
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
                    <a class="btn btn-outline-primary disabled" href=""><?php echo lang('Blog.headerActivities'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Section Start -->
<section class="contact-section">
    <div class="container p-5">
        <div class="d-flex flex-column text-center mb-5">
            <h1 class="mb-4"><?php echo lang('Blog.ContactDesc'); ?></h1>
            <hr style="border: 2px solid #333; width: 50%; margin: 10px auto;">
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
                                <i class=" fa-lg mb-3" aria-hidden="true"></i>
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

<!-- Custom Styles -->
<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); /* Adjust the shadow as needed */
    }

    .title-with-line {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        background-color: #ffffff;
        border-radius: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 20px 0; /* Add margin for spacing */
    }

    .title-with-line::after {
        content: '';
        display: block;
        width: 100px; /* Adjust the width of the line as needed */
        height: 3px;
        background-color: #007bff;
        margin: 10px auto 0; /* Center the line below the text */
        border-radius: 2px; /* Rounded corners for the line */
    }

    .map {
        width: 100%;
        height: 400px; /* Increase the height for a larger map */
        border-radius: 15px;
        overflow: hidden;
    }


    .card {
        border-radius: 15px;
        max-width: 500px;
        /* Adjust the width of the contact card as needed */
        margin: auto;
        /* Center the card */
    }

    .card-body {
        padding: 1.5rem;
    }

    .blockquote {
        font-size: 1.2rem;
        /* Increase the font size */
        text-align: center;
        /* Center align the text */
    }

    .fa-map-marker-alt {
        color: #3684c6;
        /* Change the color of the icon */
        display: block;
        margin: auto;
        /* Center the icon */
    }

    .social-icons a {
        color: #3684c6;
        /* Change the color of the social media icons */
    }

    .social-icons a:hover {
        color: #0056b3;
        /* Change the hover color of the social media icons */
    }

    .social-icons .fa {
        margin: 15px;
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
        /* Add text shadow */
    }
</style>

<?= $this->endSection('content'); ?>
