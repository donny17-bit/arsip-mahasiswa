<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url(); ?>/img/logo.png" height="40px" width="40px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/perbarui'); ?>">Perbarui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/telusuri'); ?>">Telusuri</a>
                </li>
            </ul>
            <form action="<?= base_url(); ?>/daftar-mahasiswa" class="form-inline my-2 my-lg-0" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Arsip Mahasiswa" aria-label="Search" name="keyword">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>