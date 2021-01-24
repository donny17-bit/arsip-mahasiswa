<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/menu.css">
    <title><?= $title; ?></title>
    <style>
        body:before {
            content: "";
            position: fixed;
            z-index: -1;
            background-size: cover;
            background-position: center top;
            display: block;
            background-image: white;
            width: 100%;
            height: 100%;
            filter: blur(5px);
            -webkit-filter: blur(5px);
        }

        h1 {
            text-align: center;
            font-size: 90px;
            color: black;
            font-weight: bold;
            border: 5px #ffd700 solid;
            display: inline-block;
            padding: 5px 20px;
        }
    </style>
</head>

<body>
    <br><br><br>
    <center>
        <div class="container" style="width: 70%">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <div class="row-auto">
                            <img src="<?= base_url(); ?>/img/logo.png" height="120px" width="120px">
                        </div>
                    </div>
                    <div class="col text-left">
                        <div class="row">
                            <h2><b> ARSIP MAHASISWA </b></h2>
                        </div>
                        <div class="row">
                            PROGRAM STUDI INFORMATIKA
                        </div>
                        <div class="row">
                            FAKULTAS SAINS DAN TEKNOLOGI
                        </div>
                        <div class="row">
                            UNIVERSITAS SANATA DHARMA YOGYAKARTA
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mt-3 border-bottom border-dark">
                <!-- <u>
                    <h2>___________________________________________________________________________________</h2>
                </u> -->
            </div>
            <br>
            <div class="col text-left">
                <!-- style="margin-left: 20px; margin-right:20px" -->
                <div class="row">
                    <div class="col">
                        <div class="form-group row justify-content-center">
                            <div class="col-auto">
                                <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $nim; ?>" style="width: 10rem">
                            </div>
                        </div> <br>
                        <!-- data mahasiswa -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Biodata Mahasiswa </h3>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['nama']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIM</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['nim']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Angkatan</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['tahunAngkatan']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">DPA</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['dpa']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['status']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['jenisKelamin']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Peminatan</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['minat']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['tempat']; ?>, <?= $mahasiswa['tanggalLahir']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['alamat']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kontak</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['kontak']; ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <label class="col-10 col-form-label">: <?= $mahasiswa['email']; ?></label>
                        </div>

                        <!-- asistensi mahasiswa -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Riwayat Asistensi Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($asistensi != null) : ?>
                            <table class="table border" style="background-color: white">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tahun Ajaran</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Dosen Pengampu</th>
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
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum pernah melakukan asistensi</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- data kolokium mahasiswa -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Data Kolokium Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($kolokium != null) : ?>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Lengkap</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['nama']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIM</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['nim']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal kolokium</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['tanggal']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Judul</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['judul']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Pembimbing 1 </label>
                                <label class="col-9 col-form-label">: <?= $kolokium['dosen1']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Pembimbing 2 </label>
                                <label class="col-9 col-form-label">: <?= $kolokium['dosen2']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Reviewer</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['reviewer']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nilai</label>
                                <label class="col-9 col-form-label">: <?= $kolokium['nilai']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <textarea readonly class="col-9 form-control" style="border-color: white; resize: none; background-color: white;"> : dada <?= $kolokium['keterangan']; ?></textarea>
                            </div>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">*</label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum melaksanakan kolokium</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- Pendadaran  -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Data Pendadaran Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($pendadaran != null) : ?>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Lengkap</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['nama']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIM</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['nim']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Pendadaran</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['tanggal']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Judul</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['judul']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Pembimbing 1 </label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['dosen1']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Pembimbing 2 </label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['dosen2']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Reviewer</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['reviewer']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Ketua Penguji</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['ketuaPenguji']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Sekretaris Penguji</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['sekretarisPenguji']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Anggota Penguji</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['anggotaPenguji']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nilai</label>
                                <label class="col-9 col-form-label">: <?= $pendadaran['nilai']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keterangan</label>
                                <textarea readonly class="col-9 form-control" style="border-color: white; resize: none; background-color: white;"> : <?= $pendadaran['keterangan']; ?></textarea>
                            </div>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum melaksanakan Pendadaran</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- Yudisium -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Data Yudisium Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($yudisium != null) : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label"><b>Surat keterangan dapat diunduh di sub menu yudisium</b></label>
                            </div>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum melaksanakan yudisium</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- Data Kp -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Data Kerja Praktek Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($kp != null) : ?>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Lengkap</label>
                                <label class="col-9 col-form-label">: <?= $mahasiswa['nama']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIM</label>
                                <label class="col-9 col-form-label">: <?= $mahasiswa['nim']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Masa Kerja Prakek</label>
                                <label class="col-9 col-form-label">: <?= $kp['tanggal_mulai']; ?> s/d <?= $kp['tanggal_berakhir']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tempat Kerja Praktek</label>
                                <label class="col-9 col-form-label">: <?= $kp['tempat_kp']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Seminar</label>
                                <label class="col-9 col-form-label">: <?= $kp['tanggal_seminar']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Pembimbing/Pendamping</label>
                                <label class="col-9 col-form-label">: <?= $kp['dosen_pembimbing']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Dosen Seminar</label>
                                <label class="col-9 col-form-label">: <?= $kp['dosen_seminar']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label"><b>Surat tugas, absensi, dan berita acara dapat diunduh melalui sub menu seminar KP</b></label>
                            </div>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum melaksanakan seminar KP</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- Naskah Skripsi -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Data Skripsi Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($skripsi != null) : ?>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Judul Skripsi</label>
                                <label class="col-9 col-form-label">: <?= $skripsi['judul']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Tanggal Pengesahan</label>
                                <label class="col-9 col-form-label">: <?= $skripsi['tanggal']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Penyimpanan</label>
                                <label class="col-9 col-form-label" style="color: cornflowerblue;">: https://repository.usd.ac.id/cgi/search/simple?q=<?= $skripsi['nim']; ?>&_action_search=Search&_action_search=Search&_order=bytitle&basic_srchtype=ALL&_satisfyall=ALL</label>
                            </div>
                        <?php else : ?>
                            <div class="form-group row">
                                <label class="col-form-label">* </label>
                                <label class="col-form-label" style="color: red;"><b>Mahasiswa belum mengumpulkan skripsi</b></label>
                            </div>
                        <?php endif; ?>

                        <!-- Lomba -->
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Riwayat Lomba Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($lomba != null) : ?>
                            <table class="table border" style="background-color: white">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lomba</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($lomba as $l) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $l['nama_lomba']; ?></td>
                                            <td><?= $l['tanggal']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="form-group row">
                                <div class="col">
                                    <table class="table border" style="background-color: white">
                                        <thead class="thead-light text-center">
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
                        <div class="col text-center">
                            <br>
                            <h3 style="vertical-align: middle;"> Jurnal Mahasiswa </h3>
                        </div>
                        <br>
                        <?php if ($jurnal != null) : ?>
                            <table class="table border" style="background-color: white">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Jurnal</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($jurnal as $l) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $l['judul_jurnal']; ?></td>
                                            <td><?= $l['tanggal']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="form-group row">
                                <div class="col">
                                    <table class="table border" style="background-color: white">
                                        <thead class="thead-light text-center">
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
            <script>
                window.print();
            </script>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>