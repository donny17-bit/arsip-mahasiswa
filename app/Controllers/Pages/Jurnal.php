<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\JurnalModel;

//use CodeIgniter\HTTP\Request;

class Jurnal extends BaseController
{
    public function jurnal($nim)
    {
        //kenapa nim ditaruh di $data karena, jika nim tersebut tidk memilki jurnal maka tidak akan eroro di viewnya
        $dataJurnal = new JurnalModel();
        $dataJur = $dataJurnal->search($nim);

        $currentPage = $this->request->getVar('page_jurnal') ? $this->request->getVar('page_jurnal') : 1;
        //$currentPage = $this->request->getVar('page_lomba') ? $this->request->getVar('page_lomba') : 1;

        $data = [
            'title' => 'Jurnal | Arsip Mahasiswa',
            'jurnal' => $dataJur->paginate(10, 'jurnal'),
            'pager' => $dataJurnal->pager,
            'nim'   => $nim,
            'currentPage' => $currentPage
        ];

        return view('Jurnal/jurnalPage', $data);
    }

    public function tambahJurnal($nim)
    {
        session();
        $data = [
            'title' => 'Tambah Jurnal Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim
        ];

        return view('Jurnal/tambahJurnal', $data);
    }

    public function saveJurnal($nim)
    {
        //validaasi
        if (!$this->validate([
            'judulJurnal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama jurnal harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'jurnal' => [
                'rules' => 'uploaded[jurnal]',
                'errors' => [
                    'uploaded' => 'Silahkan upload jurnal'
                ]
            ]
        ])) {
            return redirect()->to(base_url('tambah-jurnal/' . $nim))->withInput();
        }

        //ambil file
        $file = $this->request->getFile('jurnal');

        $ext = $file->getClientExtension();
        $namaFile = $nim . '_Jurnal.' .  $ext;

        //pindah File ke folder server
        $file->move('file/jurnal', $namaFile);

        $jurnal = new JurnalModel();
        $jurnal->save([
            'nim' => $nim,
            'judul_jurnal' => $this->request->getVar('judulJurnal'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jurnal' => $file->getName()

        ]);

        session()->setFlashData('pesan', 'Jurnal Berhasil Ditambahkan');

        return redirect()->to(base_url('jurnal/' . $nim));
    }

    public function deleteJurnal($nim, $id)
    {
        $jurnal = new JurnalModel();

        //cari file berdasarkan id
        $namaFile = $jurnal->find($id);

        //hapus file
        unlink('file/jurnal/' . $namaFile['jurnal']);
        $jurnal->delete($id);

        session()->setFlashData('pesan', 'Jurnal Berhasil Dihapus');

        return redirect()->to(base_url('jurnal/' . $nim));
    }

    public function editJurnal($nim, $id)
    {
        session();
        $jurnal = new JurnalModel();
        $dataJur = $jurnal->search($nim);

        $data = [
            'title' => 'Ubah Jurnal Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'jurnal'    => $jurnal->search($id)->first(),
            'dataJurnal' => $dataJur->paginate(10, 'jurnal')
        ];

        return view('Jurnal/editJurnal', $data);
    }

    public function updateJurnal($nim, $id)
    {
        $jurnal = new JurnalModel();
        $jurnalLama = $jurnal->search($id)->first();

        //cek nama
        if ($jurnalLama['judul_jurnal'] == $this->request->getVar('judulJurnal')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required';
        }

        //validaasi
        if (!$this->validate([
            'judulJurnal' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Nama jurnal harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-jurnal/' . $nim . '/' . $id))->withInput();
        }

        $file = $this->request->getFile('jurnal');

        //cek file
        if ($file->getError() == 4) {
            $namaFileBaru = $this->request->getVar('fileLama');
        } else {
            $ext = $file->getClientExtension();
            $namaFileBaru = $nim . '_Jurnal.' . $ext;
            $namaFileLama = $this->request->getVar('fileLama');
            //pindah gambar ke server
            $file->move('file/jurnal', $namaFileBaru);
            $namaFileBaru = $file->getName();
            //hapus file lama di server
            unlink('file/jurnal/' . $namaFileLama);
        }

        $jurnal->save([
            'id' => $id,
            'nim' => $nim,
            'judul_jurnal' => $this->request->getVar('judulJurnal'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jurnal' => $namaFileBaru

        ]);

        session()->setFlashData('pesan', 'Jurnal Berhasil diubah');

        return redirect()->to(base_url('jurnal/' . $nim));
    }

    public function printJurnal($jurnal)
    {
        // dd($jurnal);
        $data = [
            'title' => $jurnal,
            'jurnal' => $jurnal
        ];
        return view('Jurnal/printjurnal', $data);
    }
}
