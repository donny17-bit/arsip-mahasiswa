<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP NASKAH SKRIPSI MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <div class="col text-left" style="margin-left:10px;">
        <form action="<?= base_url(); ?>/update-skripsi/<?= $nim; ?>/<?= $skripsi['id']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <div class="col">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul Skripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ?
                                                                        'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ?
                                                                                                                                            old('judul') : $skripsi['judul']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPembimbing1" class="col-sm-2 col-form-label">Pembimbing 1 </label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosenPembimbing1')) ? 'is-invalid' : ''; ?>" name="dosenPembimbing1">
                                <option selected><?= (old('dosenPembimbing1')) ? old('dosenPembimbing1') : $skripsi['dosenPembimbing1']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosenPembimbing1'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPembimbing2" class="col-sm-2 col-form-label">Pembimbing 2 </label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosenPembimbing2')) ? 'is-invalid' : ''; ?>" name="dosenPembimbing2">
                                <option selected><?= (old('dosenPembimbing2')) ? old('dosenPembimbing2') : $skripsi['dosenPembimbing2']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosenPembimbing2'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengesahan</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ?
                                                                        'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ?
                                                                                                                                        old('tanggal') : $skripsi['tanggal']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row"> form link ke repository (no need this)
                            <label for="skripsi" class="col-sm-2 col-form-label">Link Perpustakaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('skripsi')) ?
                                                                            'is-invalid' : ''; ?>" id="skripsi" name="skripsi" value="<?= (old('skripsi')) ?
                                                                                                                                            old('skripsi') : $skripsi['skripsi']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('skripsi'); ?>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-2">
                    <a class="btn btn-danger btn-block" href="<?= base_url(); ?>/skripsi/<?= $nim; ?>">Cancel</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?');">Simpan</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>