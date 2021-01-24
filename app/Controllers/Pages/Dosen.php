<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    public function saveDosen()
    {
        $dosen = new DosenModel();

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
            return redirect()->to(base_url('perbaruiDosen/'))->withInput();
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

            $npp = $d[1];
            $nama = $d[2];
            $prodi = $d[3];

            $dataSimpanMah = [ //save mahasiswa
                'npp' => $npp,
                'nama' => $nama,
                'prodi' => $prodi
            ];

            if ($dosen->search($npp)->findAll() == null) {
                $dosen->insert($dataSimpanMah);
            };
        };

        session()->setFlashData('pesan', 'Dosen Berhasil Ditambahkan');

        return redirect()->to(base_url('perbaruiDosen/'));
    }

    public function hapusDosen($id)
    {
        $dosen = new DosenModel();
        $dosen->delete($id);

        session()->setFlashData('pesan', 'Dosen Berhasil Dihapus');

        return redirect()->to(base_url('perbaruiDosen/'));
    }
}
