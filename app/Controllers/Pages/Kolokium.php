<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KolokiumModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;


//use CodeIgniter\HTTP\Request;

class Kolokium extends BaseController
{
    public function kolokium($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->search($nim)->first();

        $dataKolokium = new KolokiumModel();
        $dataKol = $dataKolokium->search($nim)->findAll();

        if ($dataKol == null) {
            $dataKolokium->save([
                'nim' => $nim,
                'nama' => $dataMahasiswa['nama'],
                'judul' => '-',
                'dosen1' => '-',
                'dosen2' => '-',
                'reviewer' => '-',
                'nilai' => '-',
                'keterangan' => ''
            ]);
        };
        $dataKol = $dataKolokium->search($nim)->findAll();

        $data = [
            'title' => 'Kolokium',
            'kolokium' => $dataKol,
            'nim'   => $nim
        ];

        return view('Kolokium/kolokiumPage', $data);
    }

    public function editKolokium($nim)
    {
        session();
        $kolokium = new KolokiumModel();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();

        // dd($jurnal->search($id)->first());

        //$currentPage = $this->request->getVar('page_lomba') ? $this->request->getVar('page_lomba') : 1;
        $data = [
            'title' => 'Ubah Kolokium Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'kolokium'    => $kolokium->search($nim)->first(),
            'dosen' => $dataDosen

        ];

        return view('Kolokium/editKolokium', $data);
    }

    public function updateKolokium($nim, $id)
    {
        $kolokium = new KolokiumModel();
        $kolokiumLama = $kolokium->search($id)->first();

        // //cek nama
        // if ($skripsiLama['judul'] == $this->request->getVar('judul')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required';
        // }

        //validaasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendadaran harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'dosen1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen 1 harus di isi'
                ]
            ],
            'dosen2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen 2 harus di isi'
                ]
            ],
            'reviewer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Reviewer harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-kolokium/' . $nim))->withInput();
        }

        //ambil file
        $fileBeritaAcara = $this->request->getFile('beritaAcara');

        //cek file surat tugas
        if ($fileBeritaAcara->getError() == 4) {
            $beritaAcaraBaru = $this->request->getVar('beritaAcaraLama');
        } else {
            $ext = $fileBeritaAcara->getClientExtension();
            $beritaAcaraBaru = $nim . '_Berita_Acara_Kolokium.' . $ext;
            $beritaAcaraLama = $this->request->getVar('beritaAcaraLama');
            //pindah file ke server
            $fileBeritaAcara->move('file/kolokium', $beritaAcaraBaru);
            $beritaAcaraBaru = $fileBeritaAcara->getName();

            if ($beritaAcaraLama != null) {
                //hapus file lama di server
                unlink('file/kolokium/' . $beritaAcaraLama);
            };
        }

        $kolokium->save([
            'id' => $id,
            'nim' => $nim,
            'judul' => $this->request->getVar('judul'),
            'dosen1' => $this->request->getVar('dosen1'),
            'dosen2' => $this->request->getVar('dosen2'),
            'tanggal' => $this->request->getVar('tanggal'),
            'reviewer' => $this->request->getVar('reviewer'),
            'ketuaPenguji' => $this->request->getVar('ketuaPenguji'),
            'sekretarisPenguji' => $this->request->getVar('sekretarisPenguji'),
            'anggotaPenguji' => $this->request->getVar('anggotaPenguji'),
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'beritaAcara' => $beritaAcaraBaru
        ]);

        session()->setFlashData('pesan', 'Kolokium Berhasil diubah');

        return redirect()->to(base_url('kolokium/' . $nim));
    }

    public function printBeritaAcara($beritaAcara)
    {
        $data = [
            'title' => $beritaAcara,
            'beritaAcara' => $beritaAcara
        ];
        return view('Kolokium/printBeritaAcaraKolokium', $data);
    }
}
