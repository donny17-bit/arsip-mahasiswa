<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KerjaPraktekModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;
use App\Models\AsistensiModel;
use App\Models\JurnalModel;
use App\Models\KolokiumModel;
use App\Models\LombaModel;
use App\Models\PendadaranModel;
use App\Models\SkripsiModel;
use App\Models\YudisiumModel;

//use CodeIgniter\HTTP\Request;

class Laporan extends BaseController
{
    public function Laporan($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $asistensi = new AsistensiModel();
        $kolokium = new KolokiumModel();
        $pendadaran = new PendadaranModel();
        $yudisium = new YudisiumModel();
        $kp = new KerjaPraktekModel();
        $skripsi = new SkripsiModel();
        $lomba = new LombaModel();
        $jurnal = new JurnalModel();

        $dataMhs = $mahasiswa->search($nim)->first();
        $dataAsis = $asistensi->search($nim)->findAll();
        $dataKol = $kolokium->search($nim)->first();
        $dataPen = $pendadaran->search($nim)->first();
        $dataYud = $yudisium->search($nim)->first();
        $dataKp = $kp->search($nim)->first();
        $dataSkripsi = $skripsi->search($nim)->first();
        $dataLomba = $lomba->search($nim)->findAll();
        $dataJurnal = $jurnal->search($nim)->findAll();

        $data = [
            'title' => 'Laporan Mahasiswa | Arsip Mahasiswa',
            'mahasiswa' => $dataMhs,
            'asistensi' => $dataAsis,
            'kolokium' => $dataKol,
            'pendadaran' => $dataPen,
            'yudisium' => $dataYud,
            'kp' => $dataKp,
            'skripsi' => $dataSkripsi,
            'lomba' => $dataLomba,
            'jurnal' => $dataJurnal,
            'nim'   => $nim
        ];

        return view('Laporan/laporanPage', $data);
    }

    public function cetakLaporan($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $asistensi = new AsistensiModel();
        $kolokium = new KolokiumModel();
        $pendadaran = new PendadaranModel();
        $yudisium = new YudisiumModel();
        $kp = new KerjaPraktekModel();
        $skripsi = new SkripsiModel();
        $lomba = new LombaModel();
        $jurnal = new JurnalModel();

        $dataMhs = $mahasiswa->search($nim)->first();
        $dataAsis = $asistensi->search($nim)->findAll();
        $dataKol = $kolokium->search($nim)->first();
        $dataPen = $pendadaran->search($nim)->first();
        $dataYud = $yudisium->search($nim)->first();
        $dataKp = $kp->search($nim)->first();
        $dataSkripsi = $skripsi->search($nim)->first();
        $dataLomba = $lomba->search($nim)->findAll();
        $dataJurnal = $jurnal->search($nim)->findAll();

        $data = [
            'title' => 'Laporan Mahasiswa | Arsip Mahasiswa',
            'mahasiswa' => $dataMhs,
            'asistensi' => $dataAsis,
            'kolokium' => $dataKol,
            'pendadaran' => $dataPen,
            'yudisium' => $dataYud,
            'kp' => $dataKp,
            'skripsi' => $dataSkripsi,
            'lomba' => $dataLomba,
            'jurnal' => $dataJurnal,
            'nim'   => $nim
        ];

        return view('Laporan/cetakLaporan', $data);
    }


    public function cetakBiodata($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $dataMhs = $mahasiswa->search($nim)->first();

        $data = [
            'title' => "Cetak Biodata | Arsip Mahasiswa",
            'mahasiswa' => $dataMhs,
            'nim' => $nim
        ];
        return view('Laporan/cetakBiodata', $data);
    }

    public function cetakAsistensi($nim)
    {
        $asistensi = new AsistensiModel();
        $dataAsis = $asistensi->search($nim)->findAll();

        $data = [
            'title' => "Cetak Asistensi | Arsip Mahasiswa",
            'asistensi' => $dataAsis,
            'nim' => $nim
        ];
        return view('Laporan/cetakAsistensi', $data);
    }

    public function cetakKolokium($nim)
    {
        $kolokium = new KolokiumModel();
        $dataKol = $kolokium->search($nim)->first();

        $data = [
            'title' => "Cetak Kolokium | Arsip Mahasiswa",
            'kolokium' => $dataKol,
            'nim' => $nim
        ];
        return view('Laporan/cetakKolokium', $data);
    }

    public function cetakPendadaran($nim)
    {
        $pendadaran = new PendadaranModel();
        $dataPen = $pendadaran->search($nim)->first();

        $data = [
            'title' => "Cetak Pendadaran | Arsip Mahasiswa",
            'pendadaran' => $dataPen,
            'nim' => $nim
        ];
        return view('Laporan/cetakPendadaran', $data);
    }

    public function cetakKp($nim)
    {
        $kp = new KerjaPraktekModel();
        $mahasiswa = new MahasiswaModel();

        $dataMhs = $mahasiswa->search($nim)->first();
        $dataKp = $kp->search($nim)->first();

        // dd($dataPen);
        $data = [
            'title' => "Cetak Kerja Praktek | Arsip Mahasiswa",
            'kp' => $dataKp,
            'mahasiswa' => $dataMhs,
            'nim' => $nim
        ];
        return view('Laporan/cetakKp', $data);
    }

    public function cetakLomba($nim)
    {
        $lomba = new LombaModel();
        $dataLomba = $lomba->search($nim)->findAll();

        $data = [
            'title' => "Cetak Lomba | Arsip Mahasiswa",
            'lomba' => $dataLomba,
            'nim' => $nim
        ];
        return view('Laporan/cetakLomba', $data);
    }

    public function cetakJurnal($nim)
    {
        $jurnal = new JurnalModel();
        $dataJurnal = $jurnal->search($nim)->findAll();

        // dd($dataLomba);
        $data = [
            'title' => "Cetak Lomba | Arsip Mahasiswa",
            'jurnal' => $dataJurnal,
            'nim' => $nim
        ];
        return view('Laporan/cetakJurnal', $data);
    }
}
