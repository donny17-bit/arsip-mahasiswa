<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP YUDISIUM MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col text-center">
            <!-- menampilkan pesan sukses data ditambahkan -->
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row" style="margin-left: 20px; margin-right:20px">
        <div class="col">
            <div class="form-group row">
                <label for="transkripNilai" class="col-3 col-form-label">Transkrip nilai</label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $yudisium['transkripNilai']; ?>">
                </div>
                <div class="col-2">
                    <a href="/transkrip-nilai/<?= $yudisium['transkripNilai']; ?>" class="btn btn-info btn-block <?= ($yudisium['transkripNilai'] == null) ?
                                                                                                                        'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
            <div class="form-group row">
                <label for="suratLulus" class="col-3 col-form-label">Surat Keterangan Lulus </label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $yudisium['suratLulus']; ?>">
                </div>
                <div class="col-2">
                    <a href="/surat-lulus/<?= $yudisium['suratLulus']; ?>" class="btn btn-info btn-block <?= ($yudisium['suratLulus'] == null) ?
                                                                                                                'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-end" style="margin-left: 20px; margin-right:20px">
        <div class="col-2">
            <a href="/edit-yudisium/<?= $nim; ?>" class="btn btn-warning btn-block" style="border-radius: 10px; color: white;"><b>Edit</b></a>
        </div>
    </div>
    <br>
</div>

<?= $this->endSection(); ?>