<html>

<head>
    <title><?= $title; ?></title>
</head>

<body>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="row">
        <div class="col">
            <embed src="<?= base_url(); ?>/file/kolokium/<?= $beritaAcara; ?>" type="application/pdf" width="100%" height="100%">
        </div>
    </div>
</body>

</html>