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
                <h2 style="vertical-align: middle;"> Jurnal Mahasiswa </h2>
            </div>
            <br><br>
            <div class="col text-left">
                <!-- style="margin-left: 20px; margin-right:20px" -->
                <div class="row">
                    <div class="col">
                        <div class="form-group row justify-content-center">
                            <div class="col-auto">
                                <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $nim; ?>" style="width: 10rem">
                            </div>
                        </div> <br><br><br>
                        <!-- data mahasiswa -->
                        <div class="form-group row">
                            <div class="col">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script>
            window.print();
        </script> -->
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>