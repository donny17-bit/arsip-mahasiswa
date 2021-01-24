<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
<link rel="stylesheet" href="/css/style.css">


<center>
    <div class="container-fluid" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;"> EDIT DATA ASISTENSI </h2>
            </U>
        </div>
        <br>
        <div class="col text-left" style="margin-left:10px;">
            <table>
                <div class="row" style="margin-left: 20px; margin-right:20px">
                    <div class="col">
                        <form action="<?= base_url(); ?>/update-asistensi/<?= $nim; ?>/<?= $asistensi['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="fileLama" value="<?= $asistensi['sertifikat']; ?>">
                            <div class="form-group row">
                                <label for="mataKuliah" class="col-2 col-form-label">Mata Kuliah</label>
                                <div class="col">
                                    <select class="custom-select <?= ($validation->hasError('mataKuliah')) ? 'is-invalid' : ''; ?>" name="mataKuliah">
                                        <option selected><?= (old('mataKuliah')) ? old('mataKuliah') : $asistensi['mataKuliah']; ?></option>
                                        <?php foreach ($makul as $t) : ?>
                                            <option class="dropdown-item"><?= $t['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('mataKuliah'); ?>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('mataKuliah')) ?
                                                                                'is-invalid' : ''; ?>" id="mataKuliah" name="mataKuliah" value="<?= (old('mataKuliah')) ?
                                                                                                                                                    old('mataKuliah') : $asistensi['mataKuliah']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('mataKuliah'); ?>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group row">
                                <label for="tahunAjaran" class="col-2 col-form-label">Tahun Ajaran</label>
                                <div class="col-3">
                                    <select class="custom-select <?= ($validation->hasError('tahunAjaran')) ? 'is-invalid' : ''; ?>" name="tahunAjaran">
                                        <option selected><?= (old('tahunAjaran')) ? old('tahunAjaran') : $asistensi['tahunAjaran']; ?></option>
                                        <?php foreach ($tahun as $t) : ?>
                                            <option class="dropdown-item"><?= $t['tahunAngkatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahunAjaran'); ?>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <select class="custom-select <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" name="semester">
                                        <option selected><?= (old('semester')) ? old('semester') : $asistensi['semester']; ?></option>
                                        <option class="dropdown-item">GASAL</option>
                                        <option class="dropdown-item">GENAP</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('semester'); ?>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-2">
                                    <input type="text" class="form-control <?= ($validation->hasError('tahunAjaran')) ?
                                                                                'is-invalid' : ''; ?>" id="tahunAjaran" name="tahunAjaran" value="<?= (old('tahunAjaran')) ?
                                                                                                                                                        old('tahunAjaran') : $asistensi['tahunAjaran'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahunAjaran'); ?>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group row">
                                <label for="dosenPengampu" class="col-2 col-form-label">Dosen Pengampu </label>
                                <div class="col">
                                    <select class="custom-select <?= ($validation->hasError('dosenPengampu')) ? 'is-invalid' : ''; ?>" name="dosenPengampu">
                                        <option selected><?= (old('dosenPengampu')) ? old('dosenPengampu') : $asistensi['dosenPengampu']; ?></option>
                                        <?php foreach ($dosen as $dos) : ?>
                                            <option class="dropdown-item"><?= $dos['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dosenPengampu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sertifikat" class="col-2 col-form-label">Sertifikat</label>
                                <div class="col">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('sertifikat')) ?
                                                                                        'is-invalid' : ''; ?>" id="file" name="sertifikat" onchange="filePreview()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sertifikat'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="sertifikat"><?= $asistensi['sertifikat']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 justify-content-center row">
                                <div class="col-2">
                                    <a href="<?= base_url('asistensi/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?')">Ubah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </table>
        </div>
        <br>
    </div>
</center>
<?= $this->endSection(); ?>