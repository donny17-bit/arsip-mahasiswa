<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> UBAH YUDISIUM MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <div class="col text-left" style="margin-left:10px;">
        <form action="<?= base_url(); ?>/update-yudisium/<?= $nim; ?>/<?= $yudisium['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="suratLulusLama" value="<?= $yudisium['suratLulus']; ?>">
            <input type="hidden" name="transkripNilaiLama" value="<?= $yudisium['transkripNilai']; ?>">
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <div class="col">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-3 col-form-label">Transkrip Nilai</label>
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('transkripNilai')) ?
                                                                                'is-invalid' : ''; ?>" id="file" name="transkripNilai" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('transkripNilai'); ?>
                                </div>
                                <label class="custom-file-label" id="label" for="transkripNilai"><?= $yudisium['transkripNilai']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-3 col-form-label">Surat Keterangan Lulus</label>
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('suratLulus')) ?
                                                                                'is-invalid' : ''; ?>" id="file1" name="suratLulus" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('suratLulus'); ?>
                                </div>
                                <label class="custom-file-label" id="labelAbsensi" for="suratLulus"><?= $yudisium['suratLulus']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5 justify-content-center row">
                <div class="col-2">
                    <a href="<?= base_url('yudisium/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?')">Ubah Data</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>