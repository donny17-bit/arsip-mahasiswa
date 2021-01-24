<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
<link rel="stylesheet" href="/css/style2.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="/js/index2.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <br>
            <h1>Perbarui Angkatan</h1>
            <br><br><br>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col text-center">
            <!-- menampilkan pesan sukses data ditambahkan -->
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-2">
            <aside>
                <a href="<?= base_url('/tambahAngkatan'); ?>" class="btn btn-dark btn-block">
                    <img src="/img/add.png" style="height:40px;width:70px;">
                    <b>Tambah Angkatan</b>
                </a>
            </aside>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- bagian path page -->
        <div class="col-md-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/perbarui'); ?>">Perbarui</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perbarui Angkatan</li>
                </ol>
            </nav>
        </div>
        <div class="col">
            <?= $pager->links('tahun', 'pagination') ?>
        </div>
    </div>
    <br>
    <!-- bagian kolom tahun angkatan -->
    <!-- <div style="float: left;width: 90%;"> -->
    <?php for ($i = 1; $i <= 3; $i++) : ?>
        <div class="row justify-content-between">
            <?php for ($k = 0; $k <= 3; $k++) : ?>
                <?php $index = $k + ($i - 1) * 4;
                $dataLength = count($tahun);
                if ($dataLength - $index <= 0) : ?>
                    <div class="col-auto">
                        <div class="card" style="width: 10rem; opacity:0">
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-auto">
                        <div class="card" style="border-radius: 20px; background-color:  hsla(0, 30%, 90%, 0.5); width: 10rem; height: 100%;">
                            <img src="<?= base_url('/img/student.png'); ?>" class="card-img-top" style="border-radius: 20px; background-color:  hsla(0, 30%, 80%, 0.7);">
                            <div class="card-body">
                                <h5 class="card-title text-center">Angkatan <?= $tahun[$index]['tahunAngkatan']; ?> </h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="<?= base_url(); ?>/perbaruiMhs/<?= $tahun[$index]['tahun']; ?>" class=" btn btn-warning" style="width: 7.5rem;">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <form action="<?= base_url(); ?>/deleteAngkatan/<?= $tahun[$index]['tahun']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" style="width: 7.5rem;" onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <br>
    <?php endfor; ?>
    <div class="row">
        <div class="col">
            <?= $pager->links('tahun', 'pagination') ?>
        </div>
    </div>
    <br>
</div>

<?= $this->endSection(); ?>