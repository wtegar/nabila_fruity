<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Produk</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/produk/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk (In) <br><span class="custom-color custom-label">nama produk hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_produk_in" name="nama_produk_in" value="<?= old('nama_produk_in') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk (En) <br><span class="custom-color custom-label">nama produk hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_produk_en" name="nama_produk_en" value="<?= old('nama_produk_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Produk (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_produk_in" name="deskripsi_produk_in"><?= old('deskripsi_produk_in') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Produk (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_produk_en" name="deskripsi_produk_en"><?= old('deskripsi_produk_en') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Produk</label>
                                    <input class="form-control <?= ($validation->hasError('foto_produk')) ? 'is-invalid' : '' ?>" type="file" id="foto_produk" name="foto_produk">
                                    <?= $validation->getError('foto_produk') ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>

                                <!-- Tambahkan form untuk Meta Title, Meta Description, Slug ID, dan Slug EN -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="60" placeholder="Masukkan Meta Title" value="<?= old('meta_title') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" maxlength="160" placeholder="Masukkan Meta Description"><?= old('meta_description') ?></textarea>
                                </div>

                                <!-- Tambahkan input untuk Meta Title (EN) dan Meta Description (EN) -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" maxlength="60" placeholder="Masukkan Meta Title (EN)" value="<?= old('meta_title_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <textarea class="form-control" id="meta_description_en" name="meta_description_en" maxlength="160" placeholder="Masukkan Meta Description (EN)"><?= old('meta_description_en') ?></textarea>
                                </div>

                              
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
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
