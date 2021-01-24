<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<br>
<div class="row mb-5 justify-content-center">
    <div class="col-auto">
        <br>
        <h1>Tambah Mahasiswa</h1>
    </div>
</div>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); width:75%">
    <div class="row">
        <div class="col text-center my-4">
            <U>
                <h2 style="vertical-align: middle;">FORM TAMBAH MAHASISWA</h2>
            </U>
        </div>
    </div>

    <br>
    <form action="<?= base_url('/saveMahasiswa'); ?>" method="post">
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="nama" class="col-2 col-form-label">
                Nama Lengkap
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                                                            'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ?
                                                                                                                    old('nama') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nim')) ?
                                                            'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= (old('nim')) ?
                                                                                                                    old('nim') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nim'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status">
                    <option selected><?= (old('status')) ? old('status') : ''; ?></option>
                    <option class="dropdown-item">Aktif</option>
                    <option class="dropdown-item">Tidak Aktif</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('status'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio1" name="jenisKelamin" value="Laki-Laki" class="custom-control-input <?= ($validation->hasError('jenisKelamin')) ?
                                                                                                                                'is-invalid' : ''; ?>" <?= (old('jenisKelamin') == 'Laki-Laki') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="jenisKelamin" value="Perempuan" class="custom-control-input <?= ($validation->hasError('jenisKelamin')) ?
                                                                                                                                'is-invalid' : ''; ?>" <?= (old('jenisKelamin') == 'Perempuan') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('jenisKelamin'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="tahunAngkatan" class="col-sm-2 col-form-label">Tahun Angkatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('tahunAngkatan')) ?
                                                            'is-invalid' : ''; ?>" id="tahunAngkatan" name="tahunAngkatan" value="<?= (old('tahunAngkatan')) ?
                                                                                                                                        old('tahunAngkatan') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tahunAngkatan'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="tempat" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
            <div class="col-auto">
                <input type="text" class="form-control <?= ($validation->hasError('tempat')) ?
                                                            'is-invalid' : ''; ?>" id="tempat" name="tempat" value="<?= (old('tempat')) ?
                                                                                                                        old('tempat') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat'); ?>
                </div>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control <?= ($validation->hasError('tanggalLahir')) ?
                                                            'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggalLahir" value="<?= (old('tanggalLahir')) ?
                                                                                                                                    old('tanggalLahir') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggalLahir'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ?
                                                                'is-invalid' : ''; ?>" id="alamat" name="alamat" style="resize: none;height: 100px;overflow-y: scroll;"><?= (old('alamat')) ?
                                                                                                                                                                            old('alamat') : ''; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('kontak')) ?
                                                            'is-invalid' : ''; ?>" id="kontak" name="kontak" value="<?= (old('kontak')) ?
                                                                                                                        old('kontak') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kontak'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('email')) ?
                                                            'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ?
                                                                                                                        old('email') : ''; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px; margin-right:20px;">
            <label for="dpa" class="col-sm-2 col-form-label">DPA</label>
            <div class="col-10">
                <select class="custom-select <?= ($validation->hasError('dpa')) ? 'is-invalid' : ''; ?>" name="dpa">
                    <option selected><?= (old('dpa')) ? old('dpa') : ''; ?></option>
                    <?php foreach ($dosen as $dos) : ?>
                        <option class="dropdown-item"><?= $dos['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('dpa'); ?>
                </div>
                <small class="form-text text-muted">
                    Wajib di isi
                </small>
            </div>
        </div>
        <div class="form-group row mt-5 mb-3 justify-content-center">
            <div class="col-auto">
                <a href="<?= base_url('perbaruiMhs'); ?>" class="btn btn-danger">Cancel</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?');">Simpan</button>
            </div>
        </div>
        <br>
    </form>
</div>
<br><br>
<?= $this->endSection(); ?>