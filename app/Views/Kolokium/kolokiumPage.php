<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP KOLOKIUM MAHASISWA </h2>
        </U>
    </div>
    <!-- bagian data kolokium -->
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
    <br>
    <div class="row" style="margin-left: 20px; margin-right:20px">
        <div class="col">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['nim']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal kolokium</label>
                <div class="col-sm-3">
                    <input readonly type="date" class="form-control" value="<?= $kolokium[0]['tanggal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['judul']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dosen1" class="col-sm-2 col-form-label">Dosen Pembimbing 1 </label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['dosen1']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dosen2" class="col-sm-2 col-form-label">Dosen Pembimbing 2 </label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['dosen2']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="reviewer" class="col-sm-2 col-form-label">Reviewer</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['reviewer']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['nilai']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea readonly type="text" class="form-control" value="<?= $kolokium[0]['keterangan']; ?>" style="resize: none;height: 100px;overflow-y: scroll;"> </textarea>
                </div>
            </div>
            <div class=" form-group row">
                <label for="beritaAcara" class="col-sm-2 col-form-label">Berita Acara</label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $kolokium[0]['beritaAcara']; ?>">
                </div>
                <div class="col-2">
                    <a href="/berita-acara-kolokium/<?= $kolokium[0]['beritaAcara']; ?>" class="btn btn-info <?= ($kolokium[0]['beritaAcara'] == null) ?
                                                                                                                    'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-end" style="margin-left: 20px; margin-right:20px">
        <div class="col-auto">
            <a href="<?= base_url('cetak-kolokium/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow"><b>Cetak</b></a>
        </div>
        <div class="col-4">
            <a href="http://localhost/informatika/kolokium" class="btn btn-success btn-block" style="border-radius: 10px; color: white;">Tambah Jadwal Kolokium</a>
        </div>
        <div class="col-2">
            <a href="/edit-kolokium/<?= $nim; ?>" class="btn btn-warning btn-block" style="border-radius: 10px; color: white;"><b>Edit</b></a>
        </div>
    </div>
    <br>
</div>

<?= $this->endSection(); ?>