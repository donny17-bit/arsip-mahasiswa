<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
    <div class="col text-center">
        <U>
            <br>
            <h2 style="vertical-align: middle;"> ARSIP ASISTENSI MAHASISWA </h2>
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
            <!-- bagian data -->
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <a href="<?= base_url('cetak-asistensi/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow"><b>Cetak</b></a>
                    </div>
                    <div class="col-auto">
                        <!-- <a href="#" ></a> -->
                        <a class="btn btn-primary my-2 my-sm-0" href="<?= base_url(); ?>/tambah-asistensi/<?= $nim; ?>">Tambah Data</a>
                    </div>
                    <div class="col">
                        <!-- pagination optional -->
                        <?= $pager->links('asistensi', 'pagination') ?>
                    </div>
                </div>
                <?php if ($asistensi != null) : ?>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped" style="background-color: white">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tahun Ajaran</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Dosen Pengampu</th>
                                        <th scope="col">Sertifikat</th>
                                        <th scope="col">Edit Data</th>
                                        <th scope="col">Hapus Data</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- untuk menghitung jumlah colom -->
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($asistensi as $asis) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $asis['tahunAjaran']; ?></td>
                                            <td><?= $asis['semester']; ?></td>
                                            <td class="text-left"><?= $asis['mataKuliah']; ?></td>
                                            <td class="text-left"><?= $asis['dosenPengampu']; ?></td>
                                            <td><a href="<?= base_url() ?>/sertifikat-asistensi/<?= $asis['sertifikat']; ?>" class="btn btn-outline-info shadow">Lihat/Unduh</a></td>
                                            <td><a href="<?= base_url() ?>/edit-asistensi/<?= $asis['nim']; ?>/<?= $asis['id']; ?>" class="btn btn-outline-warning shadow">Edit</a></td>
                                            <td>
                                                <form action="<?= base_url('delete-asistensi/' . $asis['nim'] . '/' . $asis['id']); ?>" method="POST">
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
                    <div class="form-group row">
                        <div class="col">
                            <table class="table table-striped" style="background-color: white">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tahun Ajaran</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Mata kuliah</th>
                                        <th scope="col">Dosen Pengampu</th>
                                        <th scope="col">Sertifikat</th>
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
        <br>
    </center>
</div>

<?= $this->endSection(); ?>