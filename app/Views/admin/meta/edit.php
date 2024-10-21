<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Meta</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <!-- Display error message if there is any -->
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Edit form -->
                    <form action="<?= base_url('admin/meta/proses_edit/' . $metaData->id_seo) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <!-- Nama Halaman -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Halaman</label>
                                    <input type="text" class="form-control" id="nama_halaman" name="nama_halaman" value="<?= old('nama_halaman', $metaData->nama_halaman) ?>">
                                </div>

                                <!-- Meta Title -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title', $metaData->meta_title) ?>">
                                </div>

                                <!-- Meta Description -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?= old('meta_description', $metaData->meta_description) ?>">
                                </div>

                                <!-- Canonical Url -->
                                <div class="mb-3">
                                    <label class="form-label">Canonical Url</label>
                                    <input type="text" class="form-control" id="canonical_url" name="canonical_url" value="<?= old('canonical_url', $metaData->canonical_url) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <!-- Display success message if there is any -->
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>
