<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\AsistensiModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;
use App\Models\MakulModel;

class Asistensi extends BaseController
{
    public function asistensi($nim)
    {
        $dataAsisten = new AsistensiModel();
        $dataAsis = $dataAsisten->search($nim)->orderBy('tahunAjaran', 'desc');
        $mahasiswa = new MahasiswaModel();
        $tahunAngkatan = $mahasiswa->search($nim)->findAll()[0]['tahunAngkatan'];

        $currentPage = $this->request->getVar('page_asistensi') ? $this->request->getVar('page_asistensi') : 1;

        $data = [
            'title' => 'Riwayat Asistensi Mahasiswa | Arsip Mahasiswa',
            'asistensi' => $dataAsis->paginate(10, 'asistensi'),
            'pager' => $dataAsisten->pager,
            'nim'   => $nim,
            'tahunAngkatan' => $tahunAngkatan,
            'currentPage' => $currentPage
        ];

        return view('Asistensi/asistensiPage', $data);
    }

    public function tambahAsistensi($nim)
    {
        session();
        $tahun = new TahunModel();
        $dosen = new DosenModel();
        $makul = new MakulModel();

        $dataMakul = $makul->findAll();
        $tahunAjaran = $tahun->orderBy('tahun', 'desc')->findAll();
        $dataDosen = $dosen->findAll();

        $data = [
            'title' => 'Tambah Asistensi Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'dosen' => $dataDosen,
            'tahun' => $tahunAjaran,
            'makul' => $dataMakul
        ];

        return view('Asistensi/tambahAsistensi', $data);
    }

    public function saveAsistensi($nim)
    {
        //validaasi
        if (!$this->validate([
            'mataKuliah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mata Kuliah harus di isi'
                ]
            ],
            'tahunAjaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun ajaran harus di isi'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester harus di isi'
                ]
            ],
            'dosenPengampu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen pengampu harus di isi'
                ]
            ],
            'sertifikat' => [
                'rules' => 'uploaded[sertifikat]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sertifikat'
                ]
            ]
        ])) {
            return redirect()->to(base_url('tambah-asistensi/' . $nim))->withInput();
        }

        //ambil file
        $file = $this->request->getFile('sertifikat');

        $ext = $file->getClientExtension();
        $namaFile = $nim . '_Sertifikat_Asistensi.' .  $ext;

        //pindah File ke folder server
        $file->move('file/asistensi', $namaFile);

        $asistensi = new AsistensiModel();
        $asistensi->save([
            'nim' => $nim,
            'tahunAjaran' => $this->request->getVar('tahunAjaran'),
            'semester' => $this->request->getVar('semester'),
            'mataKuliah' => $this->request->getVar('mataKuliah'),
            'dosenPengampu' => $this->request->getVar('dosenPengampu'),
            'sertifikat' => $file->getName()
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to(base_url('asistensi/' . $nim));
    }

    public function editAsistensi($nim, $id)
    {
        session();
        $asistensi = new AsistensiModel();
        $tahun = new TahunModel();
        $dosen = new DosenModel();
        $makul = new MakulModel();

        $tahunAjaran = $tahun->orderBy('tahun', 'desc')->findAll();
        $dataMakul = $makul->findAll();
        $dataDosen = $dosen->findAll();
        $dataAsistensi = $asistensi->search($id)->first();

        $data = [
            'title' => 'Ubah Asistensi Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'asistensi'    => $dataAsistensi,
            'dosen' => $dataDosen,
            'tahun' => $tahunAjaran,
            'makul' => $dataMakul
        ];

        return view('Asistensi/editAsistensi', $data);
    }

    public function updateAsistensi($nim, $id)
    {
        $asistensi = new AsistensiModel();
        $asistensiLama = $asistensi->search($id)->first();

        //cek nama
        // if ($asistensiLama['nama_asistensi'] == $this->request->getVar('namaasistensi')) {
        //     $rule_nama = 'required';
        // } else {
        //     $rule_nama = 'required';
        // }

        //validaasi
        if (!$this->validate([
            'mataKuliah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mata Kuliah harus di isi'
                ]
            ],
            'tahunAjaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun ajaran harus di isi'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester harus di isi'
                ]
            ],
            'dosenPengampu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen pengampu harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-asistensi/' . $nim . '/' . $id))->withInput();
        }

        $file = $this->request->getFile('sertifikat');

        //cek file
        if ($file->getError() == 4) {
            $namaFileBaru = $this->request->getVar('fileLama');
        } else {
            $ext = $file->getClientExtension();
            $namaFileBaru = $nim . '_Sertifikat_Asistensi.' . $ext;
            $namaFileLama = $this->request->getVar('fileLama');
            //pindah gambar ke server
            $file->move('file/asistensi', $namaFileBaru);
            $namaFileBaru = $file->getName();
            //hapus file lama di server
            unlink('file/asistensi/' . $namaFileLama);
        }

        $asistensi->save([
            'id' => $id,
            'nim' => $nim,
            'tahunAjaran' => $this->request->getVar('tahunAjaran'),
            'semester' => $this->request->getVar('semester'),
            'mataKuliah' => $this->request->getVar('mataKuliah'),
            'dosenPengampu' => $this->request->getVar('dosenPengampu'),
            'sertifikat' => $namaFileBaru
        ]);

        session()->setFlashData('pesan', 'Data Berhasil Diubah');

        return redirect()->to(base_url('asistensi/' . $nim));
    }

    public function deleteAsistensi($nim, $id)
    {
        $asistensi = new AsistensiModel();

        //cari file berdasarkan id
        $sertifikat = $asistensi->find($id);

        //hapus file
        unlink('file/asistensi/' . $sertifikat['sertifikat']);
        $asistensi->delete($id);

        session()->setFlashData('pesan', 'Asistensi Berhasil Dihapus');

        return redirect()->to(base_url('asistensi/' . $nim));
    }

    public function printSertifikat($sertifikat)
    {
        $data = [
            'title' => $sertifikat,
            'sertifikat' => $sertifikat
        ];
        return view('Asistensi/printSertifikatAsistensi', $data);
    }
    //--------------------------------------------------------------------

}
