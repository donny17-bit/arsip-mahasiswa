<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: white; width: 75%; height: 75% ">
    <div class="col text-center" style="color: black;">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP JURNAL MAHASISWA </h2>
        </U>
    </div>
    <br>
    <br>
    <center>
        <div class="row">
            <div class="col">
                <!-- menampilkan pesan sukses data ditambahkan -->
                <?php if (session()->getFlashData('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashData('pesan'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <a href="<?= base_url('cetak-jurnal/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow"><b>Cetak</b></a>
                    </div>
                    <div class="col-auto">
                        <!-- <a href="#" ></a> -->
                        <a class="btn btn-primary my-2 my-sm-0" href="<?= base_url(); ?>/tambah-jurnal/<?= $nim; ?>">Tambah Data</a>
                    </div>
                    <div class="col">
                        <!-- pagination optional -->
                        <?= $pager->links('jurnal', 'pagination') ?>
                    </div>
                    <br>
                </div>
                <?php if ($jurnal != null) : ?>
                    <div class="row">
                        <div class="col">
                            <table class="table  table-striped" style="background-color: white">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Lihat Jurnal</th>
                                        <th scope="col">Edit Data</th>
                                        <th scope="col">Hapus Data</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- untuk menghitung jumlah colom -->
                                    <?php $i = 1 + (10 * ($currentPage - 1));
                                    ?>
                                    <?php foreach ($jurnal as $jur) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td class="text-left"><?= $jur['judul_jurnal']; ?></td>
                                            <td><?= $jur['tanggal']; ?></td>
                                            <td><a href="/lihat-jurnal/<?= $jur['jurnal']; ?>" class="btn btn-outline-info shadow">Lihat/Unduh</a></td>
                                            <td><a href="<?= base_url() ?>/edit-jurnal/<?= $jur['nim']; ?>/<?= $jur['id']; ?>" class="btn btn-outline-warning shadow">Edit</a></td>
                                            <td>
                                                <form action="<?= base_url('delete-jurnal/' . $jur['nim'] . '/' . $jur['id']); ?>" method="POST">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-outline-danger shadow" onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped" style="background-color: white">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Lihat Jurnal</th>
                                        <th scope="col">Edit Data</th>
                                        <th scope="col">Hapus Data</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td scope="row">-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </center>
</div>

<?= $this->endSection(); ?>