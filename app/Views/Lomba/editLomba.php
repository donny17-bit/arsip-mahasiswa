<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
<link rel="stylesheet" href="/css/style.css">


<center>
    <div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;"><?= $title; ?></h2>
            </U>
        </div>
        <br>
        <div class="col text-left" style="margin-left:10px;">
            <table>
                <div class="row" style="margin-left: 20px; margin-right:20px">
                    <div class="col">
                        <form action="<?= base_url(); ?>/update-lomba/<?= $nim; ?>/<?= $lomba['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="fileLama" value="<?= $lomba['sertifikat']; ?>">
                            <div class="form-group row">
                                <label for="namaLomba" class="col-sm-2 col-form-label">Judul Lomba</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaLomba')) ?
                                                                                'is-invalid' : ''; ?>" id="namaLomba" name="namaLomba" autofocus value="<?= (old('namaLomba')) ?
                                                                                                                                                            old('namaLomba') : $lomba['nama_lomba']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('namaLomba'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lomba</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ?
                                                                                'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ?
                                                                                                                                                old('tanggal') : $lomba['tanggal'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sertifikat" class="col-sm-2 col-form-label">Sertifikat</label>
                                <div class="col-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('sertifikat')) ?
                                                                                        'is-invalid' : ''; ?>" id="file" name="sertifikat" onchange="filePreview()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sertifikat'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="sertifikat"><?= $lomba['sertifikat']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 row justify-content-center">
                                <div class="col-2">
                                    <a href="<?= base_url('lomba/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
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