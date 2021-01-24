<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;

class Angkatan extends BaseController
{
    public function saveAngkatan()
    {
        $mahasiswa = new MahasiswaModel();
        $tahun = new TahunModel();

        //validaasi
        if (!$this->validate([
            'excel' => [
                'rules' => 'uploaded[excel]|ext_in[excel,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'Silahkan upload file',
                    'ext_in' => 'File harus berbentuk excel'
                ]
            ]
        ])) {
            return redirect()->to(base_url('tambahAngkatan/'))->withInput();
        }

        //ambil file
        $file = $this->request->getFile('excel');

        //ambil extensi
        $ext = $file->getClientExtension();

        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $sp = $render->load($file);

        $data = $sp->getActiveSheet()->toArray();

        foreach ($data as $d) {
            if ($d[0] == 0) {
                continue;
            };

            $nim = $d[1];
            $nama = $d[2];
            $dpa = $d[3];
            $angkatan = $d[4];
            $kelamin = $d[5];
            $status = $d[6];

            $dataSimpanMah = [ //save mahasiswa
                'nim' => $nim,
                'nama' => $nama,
                'dpa' => $dpa,
                'tahunAngkatan' => $angkatan,
                'status' => $status,
                'jenisKelamin' => $kelamin
            ];

            if ($mahasiswa->search($nim)->findAll() == null) {
                $mahasiswa->insert($dataSimpanMah);
            };

            $thn = $mahasiswa->substring($nim)->getResultArray()[0]['tahun'];

            $dataSimpanTahun = [ //save tahun
                'tahun' => $thn,
                'tahunAngkatan' => $angkatan
            ];

            if ($tahun->search($thn)->findAll() == null || $tahun->search($angkatan)->findAll() == null) {
                $tahun->insert($dataSimpanTahun);
            };
        };

        session()->setFlashData('pesan', 'Angkatan Berhasil Ditambahkan');

        return redirect()->to(base_url('tambahAngkatan/'));
    }
}
