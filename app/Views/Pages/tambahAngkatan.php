<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<br>
<div class="row justify-content-center">
    <div class="col-auto">
        <br>
        <h1>Perbarui Angkatan</h1>
        <br><br><br>
    </div>
</div>

<div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); width:75%">
    <br>
    <div class="row mb-5 text-center" style="margin-left:20px; margin-right:20px;">
        <div class="col">
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-5" style="margin-left:20px; margin-right:20px;">
        <div class="col">
            <form action="<?= base_url(); ?>/Pages/Angkatan/saveAngkatan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row ">
                    <!-- <label for="excel" class="col-1 col-form-label">File</label> -->
                    <div class="col-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('excel')) ?
                                                                            'is-invalid' : ''; ?>" id="file" name="excel" onchange="filePreview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('excel'); ?>
                            </div>
                            <label class="custom-file-label" id="label" for="excel">Silahkan pilih file excel</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">TAMBAHKAN</button>
                    </div>
                    <div class="col">
                        <a href="<?= base_url(); ?>/file/Format_Input_Data_Mahasiswa.xlsx" class="btn btn-info" download="Format_Input_Data_Mahasiswa.xlsx">Download Format Input</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-left:10px; margin-right:10px;">
        <table class="table table-striped">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col" class="align-middle">No</th>
                    <th scope="col" class="align-middle">NIM</th>
                    <th scope="col" class="align-middle">Nama</th>
                    <th scope="col" class="align-middle">DPA</th>
                    <th scope="col" class="align-middle">Tahun Angkatan</th>
                    <th scope="col" class="align-middle">Jenis Kelamin</th>
                    <th scope="col" class="align-middle">Status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- untuk menghitung jumlah colom -->
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($mahasiswa as $mah) : ?>
                    <tr>
                        <th scope="row" class="align-middle"><?= $i++; ?></th>
                        <td class="align-middle"><?= $mah['nim']; ?></td>
                        <td class="text-left align-middle"><?= $mah['nama']; ?></td>
                        <td class="text-left align-middle"><?= $mah['dpa']; ?></td>
                        <td class="align-middle"><?= $mah['tahunAngkatan']; ?></td>
                        <td class="align-middle"><?= $mah['jenisKelamin']; ?></td>
                        <td class="align-middle"><?= $mah['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row mt-5 justify-content-center" style="margin-left:10px; margin-right:10px;">
        <div class="col-auto">
            <?= $pager->links('mahasiswa', 'pagination') ?>
        </div>
    </div>
    <br>
    <!-- <div class="col"></div> -->
    <!-- <table> -->
    <!-- <tr>
                    <td>File :
                    </td>
                    <td>
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                    </td>
                    <br>
                </tr> -->
    <!-- <tr>
                    <td>
                        Preview :
                    </td>
                </tr>
            </table> -->

    <!-- <div class="col">
        <button type="submit" class="btn btn-primary">TAMBAHKAN</button>
    </div> -->

    <!-- <a class="nav-link" href="<?= base_url('/perbaruiMhs/19?page_mahasiswa=1'); ?>">
        <center>
            <button type="submit" class="btn btn-outline-primary btn-block" style="border-radius: 10px;">TAMBAHKAN</button>
        </center>
    </a> -->

</div>
<br>
<br> <?= $this->endSection(); ?>