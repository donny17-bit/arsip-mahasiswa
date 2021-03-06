<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<center>
    <br>
    <br>
    <h1>PERBARUI DATA</h1>
    <br>
    <div class="container-fluid">
        <br><br>
        <div class="row justify-content-center">
            <table class="mt-5">
                <tr>
                    <td style="padding: 10px;">
                        <a class="nav-link" href="<?= base_url('/perbaruiMhs'); ?>">
                            <div id="btn">
                                MAHASISWA
                                <div id="circle"></div>
                            </div>
                        </a>
                    </td>
                    <td style="padding: 10px;">
                        <a class=" nav-link" href="<?= base_url('/perbaruiAngkatan'); ?>">
                            <div id="btn">
                                ANGKATAN
                                <div id="circle"></div>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col">
                <a class="nav-link" href="<?= base_url('/perbaruiDosen'); ?>">
                    <div id="btn">
                        DOSEN
                        <div id="circle"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</center>

<?= $this->endSection(); ?>