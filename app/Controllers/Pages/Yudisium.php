<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\YudisiumModel;

//use CodeIgniter\HTTP\Request;

class Yudisium extends BaseController
{
    public function yudisium($nim)
    {
        $yudisium = new YudisiumModel();
        $dataYudisium = $yudisium->search($nim)->first();

        if ($dataYudisium == null) {
            $yudisium->save([
                'nim' => $nim
            ]);
        };
        $dataYudisium = $yudisium->search($nim)->first();

        $data = [
            'title' => 'Yudisium',
            'nim'   => $nim,
            'yudisium' => $dataYudisium
        ];

        return view('Yudisium/yudisiumPage', $data);
    }

    public function editYudisium($nim)
    {
        session();
        $yudisium = new YudisiumModel();

        $data = [
            'title' => 'Ubah Yudisium Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'yudisium'    => $yudisium->search($nim)->first()
        ];

        return view('Yudisium/editYudisium', $data);
    }

    public function updateYudisium($nim, $id)
    {
        $yudisium = new YudisiumModel();
        $yudisiumLama = $yudisium->search($id)->first();

        //validaasi
        // if (!$this->validate([
        //     'transkripNilai' => [
        //         'rules' => 'uploaded[transkripNilai]',
        //         'errors' => [
        //             'uploaded' => 'Silahkan pilih transkrip nilai yang ingin di upload'
        //         ]
        //     ],
        //     'suratLulus' => [
        //         'rules' => 'uploaded[suratLulus]',
        //         'errors' => [
        //             'uploaded' => 'Silahkan pilih surat keterangan lulus yang ingin di upload'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to(base_url('edit-yudisium/' . $nim))->withInput();
        // }

        //ambil file
        $fileNilai = $this->request->getFile('transkripNilai');
        $fileLulus = $this->request->getFile('suratLulus');

        //cek file
        if ($fileNilai->getError() == 4) { //jika file tdk di update
            $nilaiBaru = $this->request->getVar('transkripNilaiLama');
        } else {
            $ext = $fileNilai->getClientExtension();
            $nilaiBaru = $nim . '_Transkrip_Nilai.' . $ext;
            $nilaiLama = $this->request->getVar('transkripNilaiLama');

            //pindah gambar ke server
            $fileNilai->move('file/yudisium', $nilaiBaru);
            $nilaiBaru = $fileNilai->getName();

            if ($nilaiLama != null) {
                //hapus file lama di server
                unlink('file/yudisium/' . $nilaiLama);
            }
        }

        if ($fileLulus->getError() == 4) {
            $lulusBaru = $this->request->getVar('suratLulusLama');
        } else {
            $ext = $fileLulus->getClientExtension();
            $lulusBaru = $nim . '_Surat_Keterangan_Lulus.' . $ext;
            $lulusLama = $this->request->getVar('suratLulusLama');

            //pindah gambar ke server
            $fileLulus->move('file/yudisium', $lulusBaru);
            $lulusBaru = $fileLulus->getName();

            if ($lulusLama != null) { //cek ada file lama tidak
                //hapus file lama di server
                unlink('file/yudisium/' . $lulusLama);
            }
        }

        $yudisium->save([
            'id' => $id,
            'nim' => $nim,
            'suratLulus' => $lulusBaru,
            'transkripNilai' => $nilaiBaru
        ]);

        session()->setFlashData('pesan', 'Yudisium Berhasil diubah');

        return redirect()->to(base_url('yudisium/' . $nim));
    }

    public function printNilai($nilai)
    {
        $data = [
            'title' => $nilai,
            'nilai' => $nilai
        ];
        return view('Yudisium/printNilai', $data);
    }

    public function printSuratLulus($suratLulus)
    {
        $data = [
            'title' => $suratLulus,
            'suratLulus' => $suratLulus
        ];
        return view('Yudisium/printSuratLulus', $data);
    }
}
