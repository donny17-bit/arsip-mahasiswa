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
                            <img src="<?= base_url(); ?>/img/logo.png" height="100px" width="100px">
                        </div>
                    </div>
                    <div class="col text-left">
                        <div class="row mt-4">
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
            <div class="col text-center">
                <br>
                <h2 style="vertical-align: middle;"> Kolokium Mahasiswa </h2>
            </div>
            <br><br>
            <div class="col text-left">
                <!-- style="margin-left: 20px; margin-right:20px" -->
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row justify-content-center">
                                <div class="col-auto">
                                    <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $nim; ?>" style="width: 10rem">
                                </div>
                            </div> <br><br><br>
                            <!-- data kolokium -->
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
                            <div class="form-group row">
                                <label class="col-form-label">*Berita Acara diunduh terpisah</label>
                            </div>
                        </div>
                    </div>
                </form>
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