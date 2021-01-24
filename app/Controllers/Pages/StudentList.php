<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\TahunModel;


class StudentList extends BaseController
{
    public function studentList($keyword = false)
    {
        $years = new TahunModel();
        $mahasiswa = new MahasiswaModel();

        // cek halaman skrng dgn melihat URL
        $currentPage = $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1;

        //cek apakah pengguna melakukan search atau tidak
        if ($keyword == false) { //jika pengguna melakukan search
            $key = $this->request->getVar('keyword');
        } else { //jika pengguna tidak melakukan search
            $key = $keyword;
            $query = $mahasiswa->substring($key);

            $dataMah = $mahasiswa->search($key);
            $panjangData = count($dataMah->findAll()); //auto reset select query
            // cek tahunAngkatan 0 atau tidak
            for ($i = 0; $i < $panjangData; $i++) {
                $dataMah = $mahasiswa->search($key);

                if ($dataMah->findAll()[$i]['tahunAngkatan'] == 0 || $dataMah->findAll()[$i]['tahunAngkatan'] == null) {
                    $angkatan = 2000 + $query->getResultArray()[$i]['tahun'];
                    $dataMah = $mahasiswa->search($key);

                    $dataMah->save([
                        'idMahasiswa' => $dataMah->findAll()[$i]['idMahasiswa'],
                        'tahunAngkatan' => $angkatan
                    ]);
                }
            }
        }

        $dataTahun = $years->orderBy('tahun', 'desc')->findAll();
        $dataMah = $mahasiswa->search($key)->orderBy('nim', 'asc');
        $data = [
            'title' => 'Daftar Mahasiswa',
            'tahun' => $dataTahun,
            'mahasiswa' => $dataMah->paginate(20, 'mahasiswa'),
            'pager' => $mahasiswa->pager,
            'currentPage' => $currentPage
        ];


        return view('StudentList/studentPage', $data);
    }


    //--------------------------------------------------------------------

}
