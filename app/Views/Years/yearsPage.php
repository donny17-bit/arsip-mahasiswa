<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <br>
            <h1>Tahun Angkatan</h1>
            <br>
        </div>
    </div>
    <br><br>
    <div class="row">
        <!-- bagian path page -->
        <div class="col-md-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color:  hsla(0, 30%, 90%, 0.9); ">
                    <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tahun Angkatan</li>
                </ol>
            </nav>
        </div>
        <div class="col">
            <?= $pager->links('tahun', 'pagination') ?>
        </div>
    </div>
    <br>
    <!-- bagian kolom tahun angkatan -->
    <?php for ($i = 1; $i <= 3; $i++) : ?>
        <div class="row justify-content-between">
            <?php for ($k = 0; $k <= 3; $k++) : ?>
                <?php $index = $k + ($i - 1) * 4;
                $dataLength = count($tahun);
                if ($dataLength - $index <= 0) : ?>
                    <!--if ini digunakan untuk mengecek halaman terakhir, agar tidak out of bound-->
                    <div class="col-auto">
                        <div class="card" style="width: 10rem; opacity:0">
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-auto">
                        <div class="card" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.5); width: 10rem; height: 100%;">
                            <img src="<?= base_url('/img/student.png'); ?>" class="card-img-top" style="border-radius: 20px; background-color:  hsla(0, 30%, 80%, 0.7);">
                            <div class="card-body">
                                <h5 class="card-title text-center">Angkatan</h5>
                                <a href="<?= base_url(); ?>/daftar-mahasiswa/<?= $tahun[$index]['tahun']; ?>" class=" btn btn-danger stretched-link" style="width: 7.5rem;">
                                    <?= $tahun[$index]['tahunAngkatan']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <br>
    <?php endfor; ?>
    <br>
    <div class="row">
        <!-- bagian page (halaman bawah) -->
        <div class="col">
            <?= $pager->links('tahun', 'pagination') ?>
        </div>
    </div>
    <br>
</div>

<?= $this->endSection(); ?>