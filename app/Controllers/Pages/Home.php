<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;
use App\Models\DosenModel;
use App\Models\AsistensiModel;
use App\Models\JurnalModel;
use App\Models\KerjaPraktekModel;
use App\Models\KolokiumModel;
use App\Models\LombaModel;
use App\Models\PendadaranModel;
use App\Models\SkripsiModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Arsip Mahasiswa'
        ];
        return view('Home/home', $data);
    }

    public function telusuri()
    {
        $tahun = new TahunModel();
        $dataTahun = $tahun->orderBy('tahun', 'desc')->findAll();
        $data = $tahun->findAll();

        //cek apakah di tahun angkatan ada 0 atau tdk
        foreach ($data as $d) {
            if ($d['tahunAngkatan'] == 0 || $d['tahunAngkatan'] == null) {
                $angkatan = 2000 + $d['tahun'];

                $tahun->save([
                    'idTahun' => $d['idTahun'],
                    'tahunAngkatan' => $angkatan
                ]);
            }
        }

        $dataTahun = $tahun->orderBy('tahun', 'desc')->findAll();
        $data = [
            'title' => 'Telusuri | Arsip Mahasiswa',
            'tahun' => $dataTahun
        ];

        return view('Home/telusuri', $data);
    }

    public function perbarui()
    {
        $data = [
            'title' => 'Perbarui | Arsip Mahasiswa'
        ];
        return view('Home/perbarui', $data);
    }

    public function perbaruiMhs($keyword = false)
    {
        session();
        $years = new TahunModel();
        $mahasiswa = new MahasiswaModel();

        // cek halaman skrng dgn melihat URL
        $currentPage = $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1;

        $key = $this->request->getVar('keyword');

        //cek apakah ingin diedit berdasarkan tahun atau tidak
        if ($keyword == false) { //jika tidak
            if ($key) { //cek apakah melakukan pencarian
                $dataMah = $mahasiswa->search($key)->orderBy('nim', 'asc'); //jika iya
            } else {
                $dataMah = $mahasiswa->orderBy('tahunAngkatan', 'desc')->orderBy('nim', 'asc'); //jika tdk
            }
        } else {
            $dataMah = $mahasiswa->search($keyword)->orderBy('nim', 'asc');
        }

        $dataTahun = $years->orderBy('tahun', 'desc')->findAll();
        $data = [
            'title' => 'Perbarui Mahasiswa | Arsip Mahasiswa',
            'tahun' => $dataTahun,
            'mahasiswa' => $dataMah->paginate(20, 'mahasiswa'),
            'pager' => $mahasiswa->pager,
            'currentPage' => $currentPage
        ];
        return view('Pages/perbaruiMahasiswa', $data);
    }

    public function deleteMahasiswa($nim, $id)
    {
        session();
        $mahasiswa = new MahasiswaModel();
        $asistensi = new AsistensiModel();
        $jurnal = new JurnalModel();
        $kerjaPraktek = new KerjaPraktekModel();
        $lomba = new LombaModel();
        $skripsi = new SkripsiModel();
        $tahunan = new TahunModel();
        $kolokium = new KolokiumModel();
        $pendadaran = new PendadaranModel();

        $thnMhs = $mahasiswa->substring($nim)->getResultArray()[0]['tahun'];
        // dd($tahun['idTahun']);
        $asis = $asistensi->search($nim)->findAll();
        $jurn = $jurnal->search($nim)->findAll();
        $kp = $kerjaPraktek->search($nim)->findAll();
        $lom = $lomba->search($nim)->findAll();
        $tesis = $skripsi->search($nim)->first();
        $pen = $pendadaran->search($nim)->first();
        $kol = $kolokium->search($nim)->first();

        //hapus file
        if ($asis != null) { //hapus riwayat asistensi mahasiswa
            foreach ($asis as $asis2) {
                unlink('file/asistensi/' . $asis2['sertifikat']);
                $asistensi->delete($asis2['id']);
            };
        };

        if ($jurnal->search($nim)->findAll() != null) { //hapus riwayat jurnal mahasiswa
            foreach ($jurn as $jur) {
                unlink('file/jurnal/' . $jur['jurnal']);
                $jurnal->delete($jur['id']);
            };
        };

        if ($kerjaPraktek->search($nim)->findAll() != null) { //hapus riwayat kp mahasiswa
            foreach ($kp as $k) {
                if ($k['surat_tugas'] != null) {
                    unlink('file/kerjaPraktek/' . $k['surat_tugas']);
                };
                if ($k['absensi'] != null) {
                    unlink('file/kerjaPraktek/' . $k['absensi']);
                };
                if ($k['berita_acara'] != null) {
                    unlink('file/kerjaPraktek/' . $k['berita_acara']);
                };
                $kerjaPraktek->delete($k['id']);
            };
        };

        if ($lomba->search($nim)->findAll() != null) { //hapus riwayat lomba mahasiswa
            foreach ($lom as $lom2) {
                unlink('file/lomba/' . $lom2['sertifikat']);
                $lomba->delete($lom2['id']);
            };
        };

        if ($skripsi->search($nim)->findAll() != null) { //hapus riwayat skripsi mahasiswa
            $skripsi->delete($tesis['id']);
        }

        if ($pendadaran->search($nim)->findAll() != null) { //hapus riwayat pendadaran mahasiswa
            if ($pen['beritaAcara'] != null) {
                unlink('file/pendadaran/' . $pen['beritaAcara']);
            };
            $pendadaran->delete($pen['id']);
        };

        if ($kolokium->search($nim)->findAll() != null) { //hapus riwayat kolokium mahasiswa
            if ($kol['beritaAcara'] != null) {
                unlink('file/kolokium/' . $kol['beritaAcara']);
            };
            $kolokium->delete($kol['id']);
        }

        if (count($mahasiswa->search($thnMhs)->findAll()) == 1) { //hapus tahun angkatan bila mahasiswa adalah org terakhir di angkatannya
            $tahun = $tahunan->search($thnMhs)->first();
            $tahunan->delete($tahun['idTahun']);
        }

        $mahasiswa->delete($id);

        session()->setFlashData('pesan', 'Mahasiswa Berhasil Dihapus');

        return redirect()->to(base_url('/perbaruiMhs'));
    }

    public function perbaruiAngkatan()
    {
        session();
        $tahun = new TahunModel();
        $dataTahun = $tahun->orderBy('tahun', 'desc');

        $data = [
            'title' => 'Perbarui Angkatan | Arsip Mahasiswa',
            'tahun' => $dataTahun->paginate(12, 'tahun'),
            'pager' => $tahun->pager
        ];
        return view('Pages/perbaruiAngkatan', $data);
    }

    public function tambahAngkatan()
    {
        session();
        $mahasiswa = new MahasiswaModel();
        $dataMah = $mahasiswa->orderBy('tahunAngkatan', 'desc')->orderBy('nim', 'asc');

        // cek halaman skrng dgn melihat URL
        $currentPage = $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1;

        $data = [
            'title' => 'Perbarui Angkatan | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $dataMah->paginate(10, 'mahasiswa'),
            'pager' => $mahasiswa->pager,
            'currentPage' => $currentPage
        ];

        return view('Pages/tambahAngkatan', $data);
    }

    public function deleteAngkatan($tahun)
    {
        session();
        $mahasiswa = new MahasiswaModel();
        $asistensi = new AsistensiModel();
        $jurnal = new JurnalModel();
        $kerjaPraktek = new KerjaPraktekModel();
        $lomba = new LombaModel();
        $skripsi = new SkripsiModel();
        $tahunan = new TahunModel();
        $kolokium = new KolokiumModel();
        $pendadaran = new PendadaranModel();

        $dataMah = $mahasiswa->search($tahun)->findAll();

        foreach ($dataMah as $mhs) {

            $nim = $mhs['nim'];
            $id = $mhs['idMahasiswa'];

            // $thnMhs = $mahasiswa->substring($nim)->getResultArray()[0]['tahun'];
            $asis = $asistensi->search($nim)->findAll();
            $jurn = $jurnal->search($nim)->findAll();
            $kp = $kerjaPraktek->search($nim)->findAll();
            $lom = $lomba->search($nim)->findAll();
            $tesis = $skripsi->search($nim)->first();
            $pen = $pendadaran->search($nim)->first();
            $kol = $kolokium->search($nim)->first();

            if ($asistensi->search($nim)->findAll() != null) { //hapus riwayat asistensi mahasiswa
                foreach ($asis as $asis2) {
                    //tambahin cek file avail ga
                    unlink('file/asistensi/' . $asis2['sertifikat']);
                    $asistensi->delete($asis2['id']);
                };
            };

            if ($jurnal->search($nim)->findAll() != null) { //hapus riwayat jurnal mahasiswa
                foreach ($jurn as $jur) {
                    //tambahin cek file avail ga
                    unlink('file/jurnal/' . $jur['jurnal']);
                    $jurnal->delete($jur['id']);
                };
            };

            if ($kerjaPraktek->search($nim)->findAll() != null) { //hapus riwayat kp mahasiswa
                foreach ($kp as $k) {
                    if ($k['surat_tugas'] != null) {
                        unlink('file/kerjaPraktek/' . $k['surat_tugas']);
                    };
                    if ($k['absensi'] != null) {
                        unlink('file/kerjaPraktek/' . $k['absensi']);
                    };
                    if ($k['berita_acara'] != null) {
                        unlink('file/kerjaPraktek/' . $k['berita_acara']);
                    };
                    $kerjaPraktek->delete($k['id']);
                };
            };

            if ($lomba->search($nim)->findAll() != null) { //hapus riwayat lomba mahasiswa
                foreach ($lom as $lom2) {
                    unlink('file/lomba/' . $lom2['sertifikat']);
                    $lomba->delete($lom2['id']);
                };
            };

            if ($skripsi->search($nim)->findAll() != null) { //hapus riwayat skripsi mahasiswa
                $skripsi->delete($tesis['id']);
            };

            if ($pendadaran->search($nim)->findAll() != null) { //hapus riwayat pendadaran mahasiswa
                if ($pen['beritaAcara'] != null) {
                    unlink('file/pendadaran/' . $pen['beritaAcara']);
                };
                $pendadaran->delete($pen['id']);
            };

            if ($kolokium->search($nim)->findAll() != null) { //hapus riwayat kolokium mahasiswa
                if ($kol['beritaAcara'] != null) {
                    unlink('file/kolokium/' . $kol['beritaAcara']);
                };
                $kolokium->delete($kol['id']);
            };

            $mahasiswa->delete($id);
        };

        $tahun = $tahunan->search($tahun)->first();
        $tahunan->delete($tahun['idTahun']);

        session()->setFlashData('pesan', 'Angkatan Berhasil Dihapus');

        return redirect()->to(base_url('/perbaruiAngkatan'));
    }

    public function perbaruiDosen()
    {
        session();
        $dosen = new DosenModel();
        // $dataTahun = $tahun->orderBy('tahun', 'desc');

        $currentPage = $this->request->getVar('page_dosen') ? $this->request->getVar('page_dosen') : 1;

        $data = [
            'title' => 'Perbarui Dosen | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'dosen' => $dosen->paginate(10, 'dosen'),
            'currentPage' => $currentPage,
            'pager' => $dosen->pager
        ];
        return view('Pages/perbaruiDosen', $data);
    }
}
