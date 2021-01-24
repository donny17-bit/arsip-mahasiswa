<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
<link rel="stylesheet" href="/css/style.css"> -->

<div class="container-fluid">
    <div class="row my-4 justify-content-center">
        <div class="col-auto">
            <br>
            <h1>Perbarui Mahasiswa</h1>
            <br><br>
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
        <!-- bagian searching -->
        <div class="col-6">
            <form action="<?= base_url(); ?>/perbaruiMhs" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:45px">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="height:45px">Cari</button>
                    </div>
                </div>
            </form>
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
    <?= $pager->links('mahasiswa', 'pagination') ?>

    <div class="row" style="background-color: white;">
        <!-- sidebar -->
        <div class="col-2" style="background-color:  hsla(0, 30%, 90%, 1);">
            <nav class="nav flex-md-column nav-pills nav-justified">
                <br>
                <div class="row">
                    <div class="col">
                        <h5 class=" text-center"><b>Tahun Angkatan</b></h5>
                    </div>
                </div>
                <?php $dataLength = count($tahun); ?>
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <div class="row shadow">
                        <?php for ($k = 0; $k <= 2; $k++) : ?>
                            <?php $index = $k + ($i - 1) * 3;
                            if ($index == $dataLength) {
                                break;
                            } ?>
                            <div class="col-sm-4">
                                <a class="nav-link text-center" style="width: 4rem;" href="/perbaruiMhs/<?= $tahun[$index]['tahun']; ?>">
                                    <?= $tahun[$index]['tahunAngkatan']; ?>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
                <div class="row shadow">
                    <div class="col">
                        <a class="nav-link text-center" style="width: 4rem;" href="/perbaruiAngkatan">Lainnya</a>
                    </div>
                </div>
                <br>
                <center>
                    <a class="nav-link" href="<?= base_url('/tambahMahasiswa'); ?>">
                        <button class="button">
                            <img src="/img/add.png" style="height:40px;width:70px;">
                            <style>
                                .button {
                                    padding: 15px 25px;
                                    font-size: 24px;
                                    text-align: center;
                                    cursor: pointer;
                                    outline: none;
                                    color: #fff;
                                    background-color: #E9E9E8;
                                    border: none;
                                    border-radius: 40%;
                                    box-shadow: 0 9px #999;

                                }

                                .button:hover {
                                    background-color: #3e8e41
                                }

                                .button:active {
                                    background-color: #3e8e41;
                                    box-shadow: 0 5px #666;
                                    transform: translateY(4px);
                                }
                            </style>
                        </button>
                    </a>
                    <br>
                </center>
            </nav>
        </div>
        <div class="col">
            <!-- table mahasiswa -->
            <table class="table table-striped">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tahun Angkatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <!-- untuk menghitung jumlah colom -->
                    <?php $i = 1 + (20 * ($currentPage - 1)); ?>
                    <?php foreach ($mahasiswa as $mah) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $mah['nim']; ?></td>
                            <td class="text-left"><?= $mah['nama']; ?></td>
                            <td><?= $mah['tahunAngkatan']; ?></td>
                            <td><?= $mah['status']; ?></td>
                            <td>
                                <form action="/deleteMahasiswa/<?= $mah['nim']; ?>/<?= $mah['idMahasiswa']; ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-outline-danger shadow" style="border-color: red;" onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <?= $pager->links('mahasiswa', 'pagination') ?>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

<!-- <script src="/js/index.js"></script> -->
<?= $this->endSection(); ?>