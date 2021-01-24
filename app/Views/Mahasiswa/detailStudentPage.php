<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>
<center>
    <div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;"> DATA MAHASISWA </h2>
            </U>
        </div>
        <br>
        <br>
        <div class="col text-left" style="margin-left:10px;">
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
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM </label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['nim']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['jenisKelamin']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahunAngkatan" class="col-sm-2 col-form-label">Tahun Angkatan</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['tahunAngkatan']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['status']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="minat" class="col-sm-2 col-form-label">Peminatan</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['minat']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-auto">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['tempat']; ?>">
                        </div>
                        <div class="col-sm-auto">
                            <input readonly type="date" class="form-control" value="<?= $dataMah[0]['tanggalLahir']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea readonly type="text" class="form-control" value="<?= $dataMah[0]['alamat']; ?>" style="resize: none;height: 100px;overflow-y: scroll;"><?= $dataMah[0]['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['kontak']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dpa" class="col-sm-2 col-form-label">DPA</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $dataMah[0]['dpa']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row justify-content-end" style="margin-left: 20px; margin-right:20px">
                <div class="col-4">
                    <a href="<?= base_url('cetak-biodata/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow"><b>Cetak Biodata</b></a>
                </div>
                <div class="col-2">
                    <a href="/edit-mahasiswa/<?= $nim; ?>" class="btn btn-warning btn-block" style="border-radius: 10px; color: white;"><b>Edit</b></a>
                </div>
            </div>
            <br>
        </div>
        <br>
    </div>


</center>
<?= $this->endSection(); ?>