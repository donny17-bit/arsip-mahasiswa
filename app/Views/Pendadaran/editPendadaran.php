<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> UBAH ARSIP PENDADARAN MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <div class="col text-left" style="margin-left:10px;">
        <form action="<?= base_url(); ?>/update-pendadaran/<?= $nim; ?>/<?= $pendadaran['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="beritaAcaraLama" value="<?= $pendadaran['beritaAcara']; ?>">
            <div class="row" style="margin-left: 20px; margin-right:20px">
                <div class="col">
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pendadaran </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ?
                                                                        'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ?
                                                                                                                                        old('tanggal') : $pendadaran['tanggal']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ?
                                                                        'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ?
                                                                                                                                    old('judul') : $pendadaran['judul']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosen1" class="col-sm-2 col-form-label"> Dosen Pembimbing 1 </label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosen1')) ? 'is-invalid' : ''; ?>" name="dosen1">
                                <option selected><?= (old('dosen1')) ? old('dosen1') : $pendadaran['dosen1']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen1'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosen2" class="col-sm-2 col-form-label"> Dosen Pembimbing 2 </label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('dosen2')) ? 'is-invalid' : ''; ?>" name="dosen2">
                                <option selected><?= (old('dosen2')) ? old('dosen2') : $pendadaran['dosen2']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen2'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reviewer" class="col-sm-2 col-form-label"> Reviewer </label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('reviewer')) ? 'is-invalid' : ''; ?>" name="reviewer">
                                <option selected><?= (old('reviewer')) ? old('reviewer') : $pendadaran['reviewer']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('reviewer'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ketuaPenguji" class="col-sm-2 col-form-label">Ketua Penguji</label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('ketuaPenguji')) ? 'is-invalid' : ''; ?>" name="ketuaPenguji">
                                <option selected><?= (old('ketuaPenguji')) ? old('ketuaPenguji') : $pendadaran['ketuaPenguji']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('ketuaPenguji'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sekretarisPenguji" class="col-sm-2 col-form-label">Sekretaris Penguji</label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('sekretarisPenguji')) ? 'is-invalid' : ''; ?>" name="sekretarisPenguji">
                                <option selected><?= (old('sekretarisPenguji')) ? old('sekretarisPenguji') : $pendadaran['sekretarisPenguji']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sekretarisPenguji'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggotaPenguji" class="col-sm-2 col-form-label">Anggota Penguji</label>
                        <div class="col-sm-10">
                            <select class="custom-select <?= ($validation->hasError('anggotaPenguji')) ? 'is-invalid' : ''; ?>" name="anggotaPenguji">
                                <option selected><?= (old('anggotaPenguji')) ? old('anggotaPenguji') : $pendadaran['anggotaPenguji']; ?></option>
                                <?php foreach ($dosen as $dos) : ?>
                                    <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('anggotaPenguji'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('nilai')) ?
                                                                        'is-invalid' : ''; ?>" id="nilai" name="nilai" value="<?= (old('nilai')) ?
                                                                                                                                    old('nilai') : $pendadaran['nilai']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nilai'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control <?= ($validation->hasError('keterangan')) ?
                                                                            'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= (old('keterangan')) ?
                                                                                                                                                old('keterangan') : $pendadaran['keterangan']; ?>" style="resize: none; height: 100px;overflow-y: scroll;"> </textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="beritaAcara" class="col-sm-2 col-form-label">Berita Acara</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('beritaAcara')) ?
                                                                                'is-invalid' : ''; ?>" id="file" name="beritaAcara" onchange="filePreview()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('beritaAcara'); ?>
                                </div>
                                <label class="custom-file-label" id="label" for="beritaAcara"><?= $pendadaran['beritaAcara']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5 justify-content-center row">
                <div class="col-auto">
                    <a href="<?= base_url('pendadaran/' . $nim); ?>" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin ?')">Ubah Data</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>