<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP SEMINAR KP MAHASISWA </h2>
        </U>
    </div>
    <!-- bagian data KP -->
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
        <h4> <b>Data Kerja Praktek</b> </h4>
    </div>
    <br>
    <div class="row" style="margin-left: 20px; margin-right:20px">
        <div class="col">
            <div class="form-group row">
                <label for="tanggal_kp" class="col-sm-2 col-form-label">Masa Kerja Praktek</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['tanggal_mulai']; ?> s.d. <?= $kp[0]['tanggal_berakhir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_kp" class="col-sm-2 col-form-label">Tempat Kerja Praktek</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['tempat_kp']; ?>">
                </div>
            </div>
            <div class=" form-group row">
                <label for="surat_tugas" class="col-sm-2 col-form-label">Surat Tugas</label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['surat_tugas']; ?>">
                </div>
                <div class="col-2">
                    <a href="/surat-tugas-kp/<?= $kp[0]['surat_tugas']; ?>" class="btn btn-info btn-block <?= ($kp[0]['surat_tugas'] == null) ?
                                                                                                                'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row" style="margin-left: 20px; margin-right:20px">
        <h4> <b>Seminar Kerja Praktek</b> </h4>
    </div>
    <br>
    <div class="row" style="margin-left: 20px; margin-right:20px">
        <div class="col">
            <div class="form-group row">
                <label for="tanggal_seminar" class="col-sm-2 col-form-label">Tanggal Seminar</label>
                <div class="col-sm-10">
                    <input readonly type="date" class="form-control" value="<?= $kp[0]['tanggal_seminar']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dosen_pembimbing" class="col-sm-2 col-form-label">Dosen Pembimbing / Pendamping</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['dosen_pembimbing']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dosen_seminar" class="col-sm-2 col-form-label">Dosen Seminar</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['dosen_seminar']; ?>">
                </div>
            </div>
            <div class=" form-group row">
                <label for="absensi" class="col-sm-2 col-form-label">Absensi</label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['absensi']; ?>">
                </div>
                <div class="col-2">
                    <a href="/absensi-kp/<?= $kp[0]['absensi']; ?>" class="btn btn-info btn-block <?= ($kp[0]['absensi'] == null) ?
                                                                                                        'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
            <div class=" form-group row">
                <label for="berita_acara" class="col-sm-2 col-form-label">Berita Acara</label>
                <div class="col">
                    <input readonly type="text" class="form-control" value="<?= $kp[0]['berita_acara']; ?>">
                </div>
                <div class="col-2">
                    <a href="/berita-acara-kp/<?= $kp[0]['berita_acara']; ?>" class="btn btn-info btn-block <?= ($kp[0]['berita_acara'] == null) ?
                                                                                                                'disabled' : ''; ?>">Lihat/Unduh</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-end" style="margin-left: 20px; margin-right:20px">
        <div class="col-auto">
            <a href="<?= base_url('cetak-kerja-praktek/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow"><b>Cetak</b></a>
        </div>
        <div class="col-2">
            <a href="/edit-kp/<?= $nim; ?>" class="btn btn-warning btn-block" style="border-radius: 10px; color: white;"><b>Edit</b></a>
        </div>
    </div>
    <!-- <a href="/edit-kp/<?= $nim; ?>" class="btn btn-primary btn-block" style="border-radius: 10px; color: white;">Edit</a> -->
    <br>
</div>

<?= $this->endSection(); ?>