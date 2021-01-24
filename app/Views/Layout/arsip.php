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
            background-image: url(<?= base_url('/img/wall1.jpg'); ?>);
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
    <?= $this->include('Layout/navbar'); ?>
    <br>

    <center>
        <div class="row justify-content-center">
            <center>
                <div class="col-auto">
                    <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $nim; ?>" style="border-radius: 5%; width: 10rem">
                </div>
            </center>
        </div>
        <br>
        <div class="row justify-content-center ">
            <div class="col-auto text-center" style="border-radius:5%; background-color: hsla(0, 30%, 90%, 0.7); color: black; font-size: 20px;">
                <b><?= $nim; ?> </b>
            </div>
            <br>
        </div>
        <br>
        <div class="what">
            <div class="nav2" style="background-color: hsla(198, 100%, 58%, 0.69);">
                <input type="checkbox">
                <span></span>
                <span></span>
                <div class="menu">
                    <li><a href="<?= base_url(); ?>/laporan/<?= $nim; ?>">Laporan</a></li>
                    <li><a href="<?= base_url(); ?>/detail/<?= $nim; ?>">Biodata</a></li>
                    <li><a href="<?= base_url(); ?>/asistensi/<?= $nim; ?>">Asistensi</a></li>
                    <li><a href="<?= base_url(); ?>/kolokium/<?= $nim; ?>">Kolokium </a> </li>
                    <li><a href="<?= base_url(); ?>/pendadaran/<?= $nim; ?>">Pendadaran</a></li>
                    <li><a href="<?= base_url(); ?>/yudisium/<?= $nim; ?>">Yudisium</a></li>
                    <li><a href="<?= base_url(); ?>/kerja-praktek/<?= $nim; ?>">Seminar KP</a></li>
                    <li><a href="<?= base_url(); ?>/skripsi/<?= $nim; ?>">Naskah Skripsi</a></li>
                    <li><a href="<?= base_url(); ?>/lomba/<?= $nim; ?>">Lomba</a></li>
                    <li><a href="<?= base_url(); ?>/jurnal/<?= $nim; ?>">Jurnal</a></li>
                </div>
            </div>
        </div>
    </center>

    <br>
    <br>

    <?= $this->renderSection('content'); ?>
    <br>
    <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        function filePreview() {
            const file = document.querySelector('#file');
            const file1 = document.querySelector('#file1');
            const file2 = document.querySelector('#file2');
            const fileLabel = document.querySelector('#label');
            const fileLabel1 = document.querySelector('#labelAbsensi');
            const fileLabel2 = document.querySelector('#labelBeritaAcara');
            // const fileLabel3 = document.querySelector('.custom-file-label');

            if (file.files[0] != null) {
                fileLabel.textContent = file.files[0].name;
                // console.log(file);
            }
            if (file1.files[0] != null) {
                fileLabel1.textContent = file1.files[0].name;
                // console.log(file1);
            }
            if (file2.files[0] != null) {
                fileLabel2.textContent = file2.files[0].name;
                // console.log(file2);
            }
            // print(file2);
        }

        function printer() {
            window.print();
        }
    </script>
</body>

</html>