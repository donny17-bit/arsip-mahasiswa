<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<center>
    <div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;">Tambah Jurnal Mahasiswa</h2>
            </U>
        </div>
        <br>
        <div class="col text-left">
            <table>
                <div class="row" style="margin-left: 20px; margin-right:20px">
                    <div class="col">
                        <form action="<?= base_url(); ?>/saveJurnal/<?= $nim; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="judulJurnal" class="col-sm-2 col-form-label">Judul Jurnal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('judulJurnal')) ?
                                                                                'is-invalid' : ''; ?>" id="judulJurnal" name="judulJurnal" autofocus value="<?= old('judulJurnal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judulJurnal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ?
                                                                                'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurnal" class="col-sm-2 col-form-label">Jurnal</label>
                                <div class="col-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('jurnal')) ?
                                                                                        'is-invalid' : ''; ?>" id="file" name="jurnal" onchange="filePreview()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jurnal'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="jurnal">Pilih jurnal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 justify-content-center row">
                                <div class="col-2">
                                    <a href="<?= base_url('jurnal/' . $nim); ?>" class="btn btn-danger btn-block">Cancel</a>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ?')">Simpan</button>
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