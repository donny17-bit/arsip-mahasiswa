<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <br>
    <div class="row justify-content-start">
        <div class="col text-center">
            <h1>Daftar Mahasiswa</h1>
            <br>
        </div>
    </div>
    <br><br><br>
    <?= $pager->links('mahasiswa', 'pagination') ?>
    <div class="row">
        <!-- sidebar -->
        <div class="col-sm-2" style="background-color:  hsla(0, 30%, 90%, 1);">
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
                                <a class="nav-link text-center" href="<?= base_url(); ?>/daftar-mahasiswa/<?= $tahun[$index]['tahun']; ?>">
                                    <?= $tahun[$index]['tahunAngkatan']; ?>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
                <div class="row">
                    <div class="col">
                        <a class="nav-link text-center" style="width: 4rem;" href="<?= base_url(); ?>/years">Lainnya</a>
                    </div>
                </div>
                <br>
            </nav>
        </div>
        <div class="col" style="background-color: white">
            <!-- table mahasiswa -->
            <table class="table table-striped">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tahun Angkatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
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
                            <td><a href="<?= base_url(); ?>/laporan/<?= $mah['nim']; ?>" class="btn btn-outline-info shadow">Lihat Arsip</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <?= $pager->links('mahasiswa', 'pagination') ?>
    </div>
</div>

<?= $this->endSection(); ?>