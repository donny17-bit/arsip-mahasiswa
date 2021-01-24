<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

    <!-- my CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/perbarui.css">
    <link rel="stylesheet" href="/css/navbar.css">

    <title><?= $title; ?></title>
    <!-- <style type="text/css">
        body:before {
        content: "";
  position: fixed;
  z-index: -1;
  background-size: cover;
  background-position: center top;
  display: block;
  background-image: "<?= base_url(); ?>/img/wall1.jpg";
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

    </style> -->
</head>

<body>
    <?= $this->include('Layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="/js/template.js"></script>
</body>

</html>