<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> EDIT ARSIP SEMINAR KP MAHASISWA </h2>
        </U>
    </div>
    <!-- bagian data KP dan seminarnya -->
    <br>
    <br>

    <div class="col text-left" style="margin-left:10px;">
        <form action="<?= base_url(); ?>/update-kp/<?= $nim; ?>/<?= $kp['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="suratTugasLama" value="<?= $kp['surat_tugas']; ?>">
            <input type="hidden" name="absensiLama" value="<?= $kp['absensi']; ?>">
            <input type="hidden" name="beritaAcaraLama" value="<?= $kp['berita_acara']; ?>">
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <h4> <b>Data Kerja Praktek</b> </h4>
            </div>
            <br>
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <div class="col">
                    <div class="form-group row">
                        <label for="tanggal_kp" class="col-sm-2 col-form-label">Masa Kerja Praktek</label>
                        <div class="col-sm-auto">
                            <input type="date" class="form-control <?= ($validation->hasError('tanngal_mulai')) ?
                                                                        'is-invalid' : 'tanggal_mulai'; ?>" value="<?= (old('tanggal_mulai')) ?
                                                                                                                        old('tanggal_mulai') : $kp['tanggal_mulai']; ?>" id="tanggal_mulai" name="tanggal_mulai">

                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_mulai'); ?>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            s/d
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal_berakhir')) ?
                                                                        'is-invalid' : 'tanggal_berakhir'; ?>" id="tanggal_berakhir" name="tanggal_berakhir" value="<?= (old('tanggal_berakhir')) ?
                                                                                                                                                                        old('tanggal_berakhir') : $kp['tanggal_berakhir']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_berakhir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_kp" class="col-sm-2 col-form-label">Tempat Kerja Praktek</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_kp')) ?
                                                                        'is-invalid' : 'tempat_kp'; ?>" id="tempat_kp" name="tempat_kp" value="<?= (old('tempat_kp')) ?
                                                                                                                                                    old('tempat_kp') : $kp['tempat_kp']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tempat_kp'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="surat_tugas" class="col-sm-2 col-form-label">Surat Tugas</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('surat_tugas')) ?
                                                                                'is-invalid' : ''; ?>" id="file" name="surat_tugas" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('surat_tugas'); ?>
                                </div>
                                <label class="custom-file-label" id="label" for="surat_tugas"><?= $kp['surat_tugas']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <h4> <b>Seminar Kerja Praktek</b> </h4>
            </div>
            <br>
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <div class="col">
                    <div class="form-group row">
                        <label for="tanggal_seminar" class="col-sm-2 col-form-label">Tanggal Seminar</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal_seminar')) ?
                                                                        'is-invalid' : 'tanggal_seminar'; ?>" id="tanggal_seminar" name="tanggal_seminar" value="<?= (old('tanggal_seminar')) ?
                                                                                                                                                                        old('tanggal_seminar') : $kp['tanggal_seminar']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_seminar'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosen_pembimbing" class="col-sm-2 col-form-label">Dosen Pembimbing / Pendamping</label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosen_pembimbing')) ? 'is-invalid' : ''; ?>" name="dosen_pembimbing">
                                <option selected><?= (old('dosen_pembimbing')) ? old('dosen_pembimbing') : $kp['dosen_pembimbing']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_pembimbing'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosen_seminar" class="col-sm-2 col-form-label">Dosen Seminar</label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosen_seminar')) ? 'is-invalid' : ''; ?>" name="dosen_seminar">
                                <option selected><?= (old('dosen_seminar')) ? old('dosen_seminar') : $kp['dosen_seminar']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_seminar'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="absensi" class="col-sm-2 col-form-label">Absensi</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('absensi')) ?
                                                                                'is-invalid' : ''; ?>" id="file1" name="absensi" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('absensi'); ?>
                                </div>
                                <label class="custom-file-label" id="labelAbsensi" for="absensi"><?= $kp['absensi']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="berita_acara" class="col-sm-2 col-form-label">Berita Acara</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('berita_acara')) ?
                                                                                'is-invalid' : ''; ?>" id="file2" name="berita_acara" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('berita_acara'); ?>
                                </div>
                                <label class="custom-file-label" id="labelBeritaAcara" for="berita_acara"><?= $kp['berita_acara']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group mt-5 justify-content-center row">
                <div class="col-2">
                    <a href="<?= base_url('kerja-praktek/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
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