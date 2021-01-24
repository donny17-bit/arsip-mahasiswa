<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP NASKAH SKRIPSI MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <table>
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
                    <label for="judul" class="col-sm-2 col-form-label">Judul Skripsi</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?= $skripsi['judul']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosenPembimbing1" class="col-sm-2 col-form-label">Pembimbing 1 </label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?= $skripsi['dosenPembimbing1']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosenPembimbing2" class="col-sm-2 col-form-label">Pembimbing 2 </label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?= $skripsi['dosenPembimbing2']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengesahan</label>
                    <div class="col-sm-10">
                        <input readonly type="date" class="form-control" value="<?= $skripsi['tanggal']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="skripsi" class="col-sm-2 col-form-label">Penyimpanan</label>
                    <div class="col-sm-3">
                        <a href="https://repository.usd.ac.id/cgi/search/simple?q=<?= $skripsi['nim']; ?>&_action_search=Search&_action_search=Search&_order=bytitle&basic_srchtype=ALL&_satisfyall=ALL" class="btn btn-info">link repository USD</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </table>
    <br>
    <div class="row justify-content-end" style="margin-left: 20px; margin-right:20px">
        <div class="col-2">
            <a href="<?= base_url(); ?>/edit-skripsi/<?= $nim; ?>" class="btn btn-warning btn-block" style="border-radius: 10px; color: white;"><b>Edit</b></a>
        </div>
    </div>
    <br>
</div>

<?= $this->endSection(); ?>