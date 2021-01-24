<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\SkripsiModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;

//use CodeIgniter\HTTP\Request;

class Skripsi extends BaseController
{

    public function skripsi($nim)
    {
        $dataSkripsi = new SkripsiModel();
        $mahasiswa = new MahasiswaModel();
        $dataSkrip = $dataSkripsi->search($nim)->first();
        $dataMahasiswa = $mahasiswa->search($nim)->first();

        if ($dataSkrip == null) {
            $dataSkripsi->save([
                'nim' => $nim,
                'nama' => $dataMahasiswa['nama'],
                'judul' => '-',
                'dosenPembimbing1' => '-',
                'dosenPembimbing2' => '-',
                'skripsi' => '-'
            ]);
        };
        $dataSkrip = $dataSkripsi->search($nim)->first();

        $data = [
            'title' => 'Skripsi',
            'nim'   => $nim,
            'skripsi' => $dataSkrip
        ];

        return view('Skripsi/skripsiPage', $data);
    }

    public function editSkripsi($nim)
    {
        session();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();
        $skripsi = new SkripsiModel();

        $data = [
            'title' => 'Ubah Skripsi Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'skripsi'    => $skripsi->search($nim)->first(),
            'dosen' => $dataDosen
        ];

        return view('Skripsi/editSkripsi', $data);
    }

    public function updateSkripsi($nim, $id)
    {
        $skripsi = new SkripsiModel();
        $skripsiLama = $skripsi->search($id)->first();

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
                    'required' => 'Judul skripsi harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'dosenPembimbing1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan dosen pembimbing'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-skripsi/' . $nim))->withInput();
        }

        $skripsi->save([
            'id' => $id,
            'nim' => $nim,
            'judul' => $this->request->getVar('judul'),
            'dosenPembimbing1' => $this->request->getVar('dosenPembimbing1'),
            'dosenPembimbing2' => $this->request->getVar('dosenPembimbing2'),
            'tanggal' => $this->request->getVar('tanggal')
        ]);

        session()->setFlashData('pesan', 'Skripsi Berhasil diubah');

        return redirect()->to(base_url('skripsi/' . $nim));
    }
}
