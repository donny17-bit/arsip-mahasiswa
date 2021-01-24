<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <br>
            <h1>ARSIP MAHASISWA</h1>
            <br>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <!-- bagian searching -->
        <div class="col-6">
            <form action="<?= base_url(); ?>/daftar-mahasiswa" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:45px">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="height:45px">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <?php $dataLength = count($tahun); ?>
    <?php for ($i = 1; $i <= 2; $i++) : ?>
        <div class="row justify-content-between">
            <?php for ($k = 0; $k <= 2; $k++) : ?>
                <?php $index = $k + ($i - 1) * 3;
                if ($index == $dataLength) {
                    break;
                } ?>
                <div class="col-auto">
                    <div class="card" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.5); width: 10rem; height: 100%;">
                        <img src="<?= base_url(); ?>/img/student.png" class="card-img-top" style="border-radius: 20px; background-color:  hsla(0, 30%, 80%, 0.7);">
                        <div class="card-body">
                            <h5 class="card-title text-center">Angkatan</h5>
                            <a href="<?= base_url(); ?>/daftar-mahasiswa/<?= $tahun[$index]['tahun']; ?>" class="btn btn-danger stretched-link" style="width: 7.5rem;">
                                <?= $tahun[$index]['tahunAngkatan']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <br>
    <?php endfor; ?>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <a href="<?= base_url('/years'); ?> " class="btn btn-primary">Lainnya</a>
        </div>
    </div>
    <br>
    <br>
</div>


<?= $this->endSection(); ?>