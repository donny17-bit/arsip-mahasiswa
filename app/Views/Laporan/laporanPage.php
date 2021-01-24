<?= $this->extend('Layout/arsip'); ?>

<?= $this->section('content'); ?>
<center>
    <div class="container-fluid" style="border-radius: 20px; background-color: hsla(0, 30%, 90%, 0.9); color: black; width: 75%; height: 75%; ">
        <div class="col text-center">
            <U>
                <br>
                <h2 style="vertical-align: middle;"> LAPORAN MAHASISWA </h2>
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

                    <!-- data mahasiswa -->
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $mahasiswa['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $mahasiswa['nim']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dpa" class="col-sm-2 col-form-label">DPA</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" value="<?= $mahasiswa['dpa']; ?>">
                        </div>
                    </div>

                    <!-- asistensi mahasiswa -->
                    <div class="form-group row mt-5 justify-content-center">
                        <h4> <b>Riwayat Asistensi</b> </h4>
                    </div>
                    <?php if ($asistensi != null) : ?>
                        <div class="form-group row">
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
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($asistensi as $asis) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $asis['tahunAjaran']; ?></td>
                                                <td><?= $asis['semester']; ?></td>
                                                <td class="text-left"><?= $asis['mataKuliah']; ?></td>
                                                <td class="text-left"><?= $asis['dosenPengampu']; ?></td>
                                                <td><a href="<?= base_url() ?>/sertifikat-asistensi/<?= $asis['sertifikat']; ?>" class="btn btn-outline-info shadow">Lihat/Unduh</a></td>
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
                                        <!-- untuk menghitung jumlah colom -->
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

                    <!-- Kolokium -->
                    <?php if ($kolokium == null) : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Kolokium</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen1" class="col-sm-2 col-form-label">Dosen Pembimbing 1 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen2" class="col-sm-2 col-form-label">Dosen Pembimbing 2 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reviewer" class="col-sm-2 col-form-label">Reviewer</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Kolokium</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kolokium['judul']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen1" class="col-sm-2 col-form-label">Dosen Pembimbing 1 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kolokium['dosen1']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen2" class="col-sm-2 col-form-label">Dosen Pembimbing 2 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kolokium['dosen2']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reviewer" class="col-sm-2 col-form-label">Reviewer</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kolokium['reviewer']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kolokium['nilai']; ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Pendadaran  -->
                    <?php if ($pendadaran == null) : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Pendadaran</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen1" class="col-sm-2 col-form-label">Dosen Pembimbing 1 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen2" class="col-sm-2 col-form-label">Dosen Pembimbing 2 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reviewer" class="col-sm-2 col-form-label">Reviewer</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ketuaPenguji" class="col-sm-2 col-form-label">Ketua Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sekretarisPenguji" class="col-sm-2 col-form-label">Sekretaris Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anggotaPenguji" class="col-sm-2 col-form-label">Anggota Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Pendadaran</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pendadaran</label>
                            <div class="col-sm-10">
                                <input readonly type="date" class="form-control" value="<?= $pendadaran['tanggal']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['judul']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen1" class="col-sm-2 col-form-label">Dosen Pembimbing 1 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['dosen1']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen2" class="col-sm-2 col-form-label">Dosen Pembimbing 2 </label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['dosen2']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reviewer" class="col-sm-2 col-form-label">Reviewer</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['reviewer']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ketuaPenguji" class="col-sm-2 col-form-label">Ketua Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['ketuaPenguji']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sekretarisPenguji" class="col-sm-2 col-form-label">Sekretaris Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['sekretarisPenguji']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anggotaPenguji" class="col-sm-2 col-form-label">Anggota Penguji</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['anggotaPenguji']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $pendadaran['nilai']; ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Yudisium -->
                    <?php if ($yudisium != null) : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Yudisium</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="suratLulus" class="col-2 col-form-label">Surat Keterangan Lulus </label>
                            <div class="col">
                                <input readonly type="text" class="form-control" value="<?= $yudisium['suratLulus']; ?>">
                            </div>
                            <div class="col-2">
                                <a href="/surat-lulus/<?= $yudisium['suratLulus']; ?>" class="btn btn-info btn-block <?= ($yudisium['suratLulus'] == null) ?
                                                                                                                            'disabled' : ''; ?>">Lihat/Unduh</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Yudisium</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="suratLulus" class="col-2 col-form-label">Surat Keterangan Lulus </label>
                            <div class="col">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                            <div class="col-2">
                                <a href="#" class="btn btn-info btn-block disabled">Lihat/Unduh</a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Data Kp -->
                    <?php if ($kp != null) : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Data Kerja Praktek</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_kp" class="col-sm-2 col-form-label">Masa Kerja Praktek</label>
                            <div class="col">
                                <input readonly type="date" class="form-control" value="<?= $kp['tanggal_mulai']; ?>">
                            </div>
                            <div class="col-1 text-center">
                                s/d
                            </div>
                            <div class="col">
                                <input readonly type="date" class="form-control" value="<?= $kp['tanggal_berakhir']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_kp" class="col-sm-2 col-form-label">Tempat Kerja Praktek</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kp['tempat_kp']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_seminar" class="col-sm-2 col-form-label">Tanggal Seminar</label>
                            <div class="col-sm-10">
                                <input readonly type="date" class="form-control" value="<?= $kp['tanggal_seminar']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen_pembimbing" class="col-sm-2 col-form-label">Dosen Pembimbing / Pendamping</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kp['dosen_pembimbing']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen_seminar" class="col-sm-2 col-form-label">Dosen Seminar</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $kp['dosen_seminar']; ?>">
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Data Kerja Praktek</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_kp" class="col-sm-2 col-form-label">Masa Kerja Praktek</label>
                            <div class="col">
                                <input readonly type="date" class="form-control" value="">
                            </div>
                            <div class="col-1 text-center">
                                s/d
                            </div>
                            <div class="col">
                                <input readonly type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_kp" class="col-sm-2 col-form-label">Tempat Kerja Praktek</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_seminar" class="col-sm-2 col-form-label">Tanggal Seminar</label>
                            <div class="col-sm-10">
                                <input readonly type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen_pembimbing" class="col-sm-2 col-form-label">Dosen Pembimbing / Pendamping</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dosen_seminar" class="col-sm-2 col-form-label">Dosen Seminar</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Naskah Skripsi -->
                    <?php if ($skripsi != null) : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Naskah Skripsi</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Skripsi</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="<?= $skripsi['judul']; ?>">
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
                                <a href="https://repository.usd.ac.id/cgi/search/simple?q=<?= $skripsi['nim']; ?>&_action_search=Search&_action_search=Search&_order=bytitle&basic_srchtype=ALL&_satisfyall=ALL" class="btn btn-info <?= ($skripsi['judul'] == null || $skripsi['judul'] == '-') ?
                                                                                                                                                                                                                                            'disabled' : ''; ?>">link repository USD</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row mt-5 justify-content-center">
                            <h4> <b>Naskah Skripsi</b> </h4>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Skripsi</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" value="-">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengesahan</label>
                            <div class="col-sm-10">
                                <input readonly type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skripsi" class="col-sm-2 col-form-label">Penyimpanan</label>
                            <div class="col-sm-3">
                                <a href="https://repository.usd.ac.id/cgi/search/simple?q=<?= $nim; ?>&_action_search=Search&_action_search=Search&_order=bytitle&basic_srchtype=ALL&_satisfyall=ALL" class="btn btn-info disabled">link repository USD</a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Lomba -->
                    <div class="form-group row mt-5 justify-content-center">
                        <h4> <b>Riwayat Lomba</b> </h4>
                    </div>
                    <?php if ($lomba != null) : ?>
                        <div class="form-group row">
                            <div class="col">
                                <table class="table table-striped" style="background-color: white">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Lomba</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Sertifikat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <!-- untuk menghitung jumlah colom -->
                                        <?php $i = 1; ?>
                                        <?php foreach ($lomba as $lom) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td class="text-left"><?= $lom['nama_lomba']; ?></td>
                                                <td><?= $lom['tanggal']; ?></td>
                                                <td><a href="<?= base_url(); ?>/sertifikat-lomba/<?= $lom['sertifikat']; ?>" class="btn btn-outline-info shadow">Lihat/Unduh</a></td>
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
                                            <th scope="col">Nama Lomba</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Sertifikat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <!-- untuk menghitung jumlah colom -->
                                        <tr>
                                            <td scope="row">-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Jurnal -->
                    <div class="form-group row mt-5 justify-content-center">
                        <h4> <b>Jurnal</b> </h4>
                    </div>
                    <?php if ($jurnal != null) : ?>
                        <div class="form-group row">
                            <div class="col">
                                <table class="table table-striped" style="background-color: white">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Lihat Jurnal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <!-- untuk menghitung jumlah colom -->
                                        <?php $i = 1; ?>
                                        <?php foreach ($jurnal as $jur) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td class="text-left"><?= $jur['judul_jurnal']; ?></td>
                                                <td><?= $jur['tanggal']; ?></td>
                                                <td><a href="/lihat-jurnal/<?= $jur['jurnal']; ?>" class="btn btn-outline-info shadow">Lihat/Unduh</a></td>
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
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Lihat Jurnal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <!-- untuk menghitung jumlah colom -->
                                        <tr>
                                            <td scope="row">-</td>
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
        </div>
        <br>
        <div class=" row justify-content-end" style="margin-left: 20px; margin-right:20px">
            <div class="col-auto">
                <a href="<?= base_url('cetak-laporan/' . $nim); ?>" class="btn btn-outline-danger btn-block shadow "><b>Cetak Laporan</b></a>
            </div>
        </div>
        <br>
    </div>
    <br>
    </div>

</center>
<?= $this->endSection(); ?>