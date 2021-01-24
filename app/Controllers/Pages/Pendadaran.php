<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PendadaranModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;


//use CodeIgniter\HTTP\Request;

class Pendadaran extends BaseController
{
    public function pendadaran($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->search($nim)->first();

        $dataPendadaran = new PendadaranModel();
        $dataPen = $dataPendadaran->search($nim)->findAll();

        if ($dataPen == null) {
            $dataPendadaran->save([
                'nim' => $nim,
                'nama' => $dataMahasiswa['nama'],
                'judul' => '-',
                'dosen1' => '-',
                'dosen2' => '-',
                'reviewer' => '-',
                'ketuaPenguji' => '-',
                'sekretarisPenguji' => '-',
                'anggotaPenguji' => '-',
                'nilai' => '-',
                'keterangan' => ''
            ]);
        };
        $dataPen = $dataPendadaran->search($nim)->findAll();

        $data = [
            'title' => 'Pendadaran',
            'pendadaran' => $dataPen,
            'nim'   => $nim
        ];

        return view('Pendadaran/pendadaranPage', $data);
    }

    public function editPendadaran($nim)
    {
        session();
        $pendadaran = new PendadaranModel();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();

        $data = [
            'title' => 'Ubah Pendadaran Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'pendadaran'    => $pendadaran->search($nim)->first(),
            'dosen' => $dataDosen
        ];

        return view('Pendadaran/editPendadaran', $data);
    }

    public function updatePendadaran($nim, $id)
    {
        $pendadaran = new PendadaranModel();
        $PendadaranLama = $pendadaran->search($id)->first();

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
            ],
            'ketuaPenguji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ketua penguji harus di isi'
                ]
            ],
            'sekretarisPenguji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sekretaris penguji harus di isi'
                ]
            ],
            'anggotaPenguji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Anggota penguji harus di isi'
                ]
            ],
            'nilai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-pendadaran/' . $nim))->withInput();
        }

        //ambil file
        $fileBeritaAcara = $this->request->getFile('beritaAcara');

        //cek file surat tugas
        if ($fileBeritaAcara->getError() == 4) {
            $beritaAcaraBaru = $this->request->getVar('beritaAcaraLama');
        } else {
            $ext = $fileBeritaAcara->getClientExtension();
            $beritaAcaraBaru =  $nim . '_Berita_Acara_Pendadaran.' . $ext;
            $beritaAcaraLama = $this->request->getVar('beritaAcaraLama');

            //pindah file ke server
            $fileBeritaAcara->move('file/pendadaran', $beritaAcaraBaru);
            $beritaAcaraBaru = $fileBeritaAcara->getName();

            if ($beritaAcaraLama != null) {
                //hapus file lama di server
                unlink('file/pendadaran/' . $beritaAcaraLama);
            };
        };

        $pendadaran->save([
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

        session()->setFlashData('pesan', 'Pendadaran Berhasil diubah');

        return redirect()->to(base_url('pendadaran/' . $nim));
    }

    public function printBeritaAcara($beritaAcara)
    {
        $data = [
            'title' => $beritaAcara,
            'beritaAcara' => $beritaAcara
        ];
        return view('Pendadaran/printBeritaAcaraPendadaran', $data);
    }
}
