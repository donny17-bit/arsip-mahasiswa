<!doctype html>
<html>

<head>
    <style type="text/css">
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

        #title {
            text-align: center;
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

        .button {
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            border-radius: 15px;

            color: #FFFFFF;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
    <title><?= $title; ?> </title>
</head>

<body>
    <div id="title">
        <h1>SISTEM ARSIP MAHASISWA
            <br>INFORMATIKA</br>
        </h1>
    </div>
    <br>
    <center>
        <a class="nav-link" href="<?= base_url('/perbarui'); ?>">
            <button class="button"><span>Perbarui </span></button>
        </a>
        <a class="nav-link" href="<?= base_url('/telusuri'); ?>">
            <button class="button"><span>Telusuri </span></button>
        </a>
    </center>
</body>

</html>

</html>