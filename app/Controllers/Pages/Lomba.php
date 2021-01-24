<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\LombaModel;

//use CodeIgniter\HTTP\Request;

class Lomba extends BaseController
{
    public function lomba($nim)
    {
        $dataLomba = new LombaModel();
        $dataLom = $dataLomba->search($nim);

        $currentPage = $this->request->getVar('page_lomba') ? $this->request->getVar('page_lomba') : 1;

        $data = [
            'title' => 'Lomba | Arsip Mahasiswa',
            'lomba' => $dataLom->paginate(10, 'lomba'),
            'pager' => $dataLomba->pager,
            'nim'   => $nim,
            'currentPage' => $currentPage
        ];

        return view('Lomba/lombaPage', $data);
    }

    public function tambahLomba($nim)
    {
        session();
        $data = [
            'title' => 'Tambah Lomba Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim
        ];

        return view('Lomba/tambahLomba', $data);
    }

    public function saveLomba($nim)
    {
        //validaasi
        if (!$this->validate([
            'namaLomba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lomba harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'sertifikat' => [
                'rules' => 'uploaded[sertifikat]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sertitikat'
                ]
            ]
        ])) {
            return redirect()->to(base_url('tambah-lomba/' . $nim))->withInput();
        }

        //ambil file
        $file = $this->request->getFile('sertifikat');

        $ext = $file->getClientExtension();
        $namaFile =  $nim . '_Sertifikat_Lomba.' . $ext;

        //pindah File ke folder server
        $file->move('file/lomba', $namaFile);

        $lomba = new LombaModel();
        $lomba->save([
            'nim' => $nim,
            'nama_lomba' => $this->request->getVar('namaLomba'),
            'tanggal' => $this->request->getVar('tanggal'),
            'sertifikat' => $file->getName()
        ]);

        session()->setFlashData('pesan', 'Lomba Berhasil Ditambahkan');

        return redirect()->to(base_url('lomba/' . $nim));
    }


    public function deleteLomba($nim, $id)
    {
        $lomba = new LombaModel();

        //cari file berdasarkan id
        $sertifikat = $lomba->find($id);

        //hapus file
        unlink('file/lomba/' . $sertifikat['sertifikat']);
        $lomba->delete($id);

        session()->setFlashData('pesan', 'Lomba Berhasil Dihapus');

        return redirect()->to(base_url('lomba/' . $nim));
    }

    public function editLomba($nim, $id)
    {
        session();
        $lomba = new LombaModel();

        $data = [
            'title' => 'Ubah Lomba Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'lomba'    => $lomba->search($id)->first()
        ];

        return view('Lomba/editLomba', $data);
    }

    public function updateLomba($nim, $id)
    {
        $lomba = new LombaModel();
        $lombaLama = $lomba->search($id)->first();

        //cek nama
        if ($lombaLama['nama_lomba'] == $this->request->getVar('namaLomba')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        //validaasi
        if (!$this->validate([
            'namaLomba' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama Lomba harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-lomba/' . $nim . '/' . $id))->withInput();
        }

        $file = $this->request->getFile('sertifikat');

        //cek file
        if ($file->getError() == 4) {
            $namaFileBaru = $this->request->getVar('fileLama');
        } else {
            $ext = $file->getClientExtension();
            $namaFileBaru = $nim . '_Sertifikat_Lomba.' . $ext;
            $namaFileLama = $this->request->getVar('fileLama');
            //pindah gambar ke server
            $file->move('file/lomba', $namaFileBaru);
            $namaFileBaru = $file->getName();

            //hapus file lama di server
            unlink('file/lomba/' . $namaFileLama);
        }

        $lomba->save([
            'id' => $id,
            'nim' => $nim,
            'nama_lomba' => $this->request->getVar('namaLomba'),
            'tanggal' => $this->request->getVar('tanggal'),
            'sertifikat' => $namaFileBaru

        ]);

        session()->setFlashData('pesan', 'Lomba Berhasil diubah');

        return redirect()->to(base_url('lomba/' . $nim));
    }

    public function printSertifikat($sertifikat)
    {
        $data = [
            'title' => $sertifikat,
            'sertifikat' => $sertifikat
        ];
        return view('Lomba/printSertifikatLomba', $data);
    }
}
