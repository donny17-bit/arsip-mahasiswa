<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>
<center>
    <div class="container-fluid" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;"> EDIT DATA MAHASISWA </h2>
            </U>
        </div>
        <br>
        <br>
        <div class="col text-left">
            <form action="<?= base_url(); ?>/update-mahasiswa/<?= $nim; ?>/<?= $mahasiswa['idMahasiswa']; ?>" method="post">
                <div class="row" style="margin-left: 20px; margin-right:20px">
                    <div class="col">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                                                                            'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ?
                                                                                                                                    old('nama') : $mahasiswa['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nim')) ?
                                                                            'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= (old('nim')) ?
                                                                                                                                    old('nim') : $mahasiswa['nim']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nim'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio1" name="jenisKelamin" value="Laki-Laki" class="custom-control-input <?= ($validation->hasError('jenisKelamin')) ?
                                                                                                                                                'is-invalid' : ''; ?>" <?= (old('jenisKelamin') == 'Laki-Laki' || $mahasiswa['jenisKelamin'] == 'Laki-Laki'
                                                                                                                                                                            || $mahasiswa['jenisKelamin'] == 'L'  || $mahasiswa['jenisKelamin'] == 'l') ?
                                                                                                                                                                            'checked' : ''; ?>>
                                    <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio2" name="jenisKelamin" value="Perempuan" class="custom-control-input <?= ($validation->hasError('jenisKelamin')) ?
                                                                                                                                                'is-invalid' : ''; ?>" <?= (old('jenisKelamin') == 'Perempuan' || $mahasiswa['jenisKelamin'] == 'Perempuan'
                                                                                                                                                                            || $mahasiswa['jenisKelamin'] == 'P' || $mahasiswa['jenisKelamin'] == 'p') ?
                                                                                                                                                                            'checked' : ''; ?>>
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenisKelamin'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahunAngkatan" class="col-sm-2 col-form-label">Tahun Angkatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('tahunAngkatan')) ?
                                                                            'is-invalid' : ''; ?>" id="tahunAngkatan" name="tahunAngkatan" value="<?= (old('tahunAngkatan')) ?
                                                                                                                                                        old('tahunAngkatan') : $mahasiswa['tahunAngkatan']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tahunAngkatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col">
                                <select class="custom-select <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status">
                                    <option selected><?= (old('status')) ? old('status') : $mahasiswa['status']; ?></option>
                                    <option class="dropdown-item">Aktif</option>
                                    <option class="dropdown-item">Tidak Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="minat" class="col-sm-2 col-form-label">Peminatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('minat')) ?
                                                                            'is-invalid' : ''; ?>" id="minat" name="minat" value="<?= (old('minat')) ?
                                                                                                                                        old('minat') : $mahasiswa['minat']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('minat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control <?= ($validation->hasError('tempat')) ?
                                                                            'is-invalid' : ''; ?>" id="tempat" name="tempat" value="<?= (old('tempat')) ?
                                                                                                                                        old('tempat') : $mahasiswa['tempat']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempat'); ?>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <input type="date" class="form-control <?= ($validation->hasError('tanggalLahir')) ?
                                                                            'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggalLahir" value="<?= (old('tanggalLahir')) ?
                                                                                                                                                    old('tanggalLahir') : $mahasiswa['tanggalLahir']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggalLahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ?
                                                                                'is-invalid' : ''; ?>" id="alamat" name="alamat" style="resize: none;height: 100px;overflow-y: scroll;"><?= (old('alamat')) ?
                                                                                                                                                                                            old('alamat') : $mahasiswa['alamat']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('kontak')) ?
                                                                            'is-invalid' : ''; ?>" id="kontak" name="kontak" value="<?= (old('kontak')) ?
                                                                                                                                        old('kontak') : $mahasiswa['kontak']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kontak'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ?
                                                                            'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ?
                                                                                                                                        old('email') : $mahasiswa['email']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dpa" class="col-sm-2 col-form-label">DPA</label>
                            <div class="col-10">
                                <select class="custom-select <?= ($validation->hasError('dpa')) ? 'is-invalid' : ''; ?>" name="dpa">
                                    <option selected><?= (old('dpa')) ? old('dpa') : $mahasiswa['dpa']; ?></option>
                                    <?php foreach ($dosen as $dos) : ?>
                                        <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('dpa'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5 justify-content-center row">
                    <div class="col-2">
                        <a href="<?= base_url('detail/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?')">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>


</center>
<?= $this->endSection(); ?>