<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KerjaPraktekModel;
use App\Models\DosenModel;

//use CodeIgniter\HTTP\Request;

class KerjaPraktek extends BaseController
{
    public function kerjaPraktek($nim)
    {
        $dataKP = new KerjaPraktekModel();
        $dataKerja = $dataKP->search($nim)->findAll();

        if ($dataKerja == null) {
            $dataKP->save([
                'nim' => $nim,
                'tempat_kp' => '-',
                'dosen_pembimbing' => '-',
                'dosen_seminar' => '-'
            ]);
        };
        $dataKerja = $dataKP->search($nim)->findAll();

        $data = [
            'title' => 'Kerja Praktek',
            'kp' => $dataKerja,
            'nim'   => $nim
        ];

        return view('KerjaPraktek/kerjaPraktekPage', $data);
    }

    public function editKp($nim)
    {
        session();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();
        $kerjaPraktek = new KerjaPraktekModel();
        // dd($jurnal->search($id)->first());

        //$currentPage = $this->request->getVar('page_lomba') ? $this->request->getVar('page_lomba') : 1;
        $data = [
            'title' => 'Ubah Seminar KP Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'kp'    => $kerjaPraktek->search($nim)->first(),
            'dosen' => $dataDosen
        ];

        return view('KerjaPraktek/editKP', $data);
    }

    public function updateKp($nim, $id)
    {
        $kerjaPraktek = new KerjaPraktekModel();
        $dataKerjaLama = $kerjaPraktek->search($nim)->first();

        // //cek nama
        // if ($skripsiLama['judul'] == $this->request->getVar('judul')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required';
        // }

        //validaasi
        if (!$this->validate([
            'tanggal_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai harus di isi'
                ]
            ],
            'tanggal_berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal berakhir harus di isi'
                ]
            ],
            'tempat_kp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tempat KP harus di isi'
                ]
            ],
            // 'surat_tugas' => [
            //     'rules' => 'uploaded[surat_tugas]',
            //     'errors' => [
            //         'uploaded' => 'silakan upload surat tugas'
            //     ]
            // ],
            'tanggal_seminar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal seminar harus di isi'
                ]
            ],
            'dosen_pembimbing' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosen pembimbing harus di isi'
                ]
            ],
            'dosen_seminar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosen seminar harus di isi'
                ]
            ],
            // 'absensi' => [
            //     'rules' => 'uploaded[absensi]',
            //     'errors' => [
            //         'uploaded' => 'silakan upload absensi'
            //     ]
            // ],
            // 'berita_acara' => [
            //     'rules' => 'uploaded[berita_acara]',
            //     'errors' => [
            //         'uploaded' => 'silakan upload berita acara'
            //     ]
            // ],
        ])) {
            return redirect()->to(base_url('edit-kp/' . $nim))->withInput();
        }

        //ambil file
        $fileSuratTugas = $this->request->getFile('surat_tugas');
        $fileAbsensi = $this->request->getFile('absensi');
        $fileBeritaAcara = $this->request->getFile('berita_acara');

        //cek file surat tugas
        if ($fileSuratTugas->getError() == 4) {
            $suratTugasBaru = $this->request->getVar('suratTugasLama');
        } else {
            $ext = $fileSuratTugas->getClientExtension();
            $suratTugasBaru = $nim . '_Surat_Tugas.' . $ext;
            $suratTugasLama = $this->request->getVar('suratTugasLama');

            //pindah gambar ke server
            $fileSuratTugas->move('file/kerjaPraktek', $suratTugasBaru);
            $suratTugasBaru = $fileSuratTugas->getName();

            if ($suratTugasLama != null) {
                //hapus file lama di server
                unlink('file/kerjaPraktek/' . $suratTugasLama);
            }
        }

        //cek file absensi
        if ($fileAbsensi->getError() == 4) {
            $absensiBaru = $this->request->getVar('absensiLama');
        } else {
            $ext = $fileAbsensi->getClientExtension();
            $absensiBaru = $nim . '_Absensi_Seminar_KP.' . $ext;
            $absensiLama = $this->request->getVar('absensiLama');

            //pindah gambar ke server
            $fileAbsensi->move('file/kerjaPraktek', $absensiBaru);
            $absensiBaru = $fileAbsensi->getName();

            if ($absensiLama != null) {
                //hapus file lama di server
                unlink('file/kerjaPraktek/' . $absensiLama);
            }
        }

        //cek file berita acara
        if ($fileBeritaAcara->getError() == 4) {
            $beritaAcaraBaru = $this->request->getVar('beritaAcaraLama');
        } else {
            $ext = $fileBeritaAcara->getClientExtension();
            $beritaAcaraBaru = $nim . '_Berita_Acara_Seminar_KP.' . $ext;
            $beritaAcaraLama = $this->request->getVar('beritaAcaraLama');

            //pindah gambar ke server
            $fileBeritaAcara->move('file/kerjaPraktek', $beritaAcaraBaru);
            $beritaAcaraBaru = $fileBeritaAcara->getName();

            if ($beritaAcaraLama != null) {
                //hapus file lama di server
                unlink('file/kerjaPraktek/' . $beritaAcaraLama);
            }
        }

        $kerjaPraktek->save([
            'id' => $id,
            'nim' => $nim,
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getVar('tanggal_berakhir'),
            'tanggal_seminar' => $this->request->getVar('tanggal_seminar'),
            'tempat_kp' => $this->request->getVar('tempat_kp'),
            'dosen_pembimbing' => $this->request->getVar('dosen_pembimbing'),
            'dosen_seminar' => $this->request->getVar('dosen_seminar'),
            'surat_tugas' => $suratTugasBaru,
            'absensi' => $absensiBaru,
            'berita_acara' => $beritaAcaraBaru
        ]);

        session()->setFlashData('pesan', 'Arsip Kerja Praktek Berhasil diubah');

        return redirect()->to(base_url('kerja-praktek/' . $nim));
    }

    public function printBeritaAcara($beritaAcara)
    {
        $data = [
            'title' => $beritaAcara,
            'beritaAcara' => $beritaAcara
        ];
        return view('KerjaPraktek/printBeritaAcaraKp', $data);
    }

    public function printSuratTugas($suratTugas)
    {
        $data = [
            'title' => $suratTugas,
            'suratTugas' => $suratTugas
        ];
        return view('KerjaPraktek/printSuratTugasKp', $data);
    }

    public function printAbsensi($absensi)
    {
        $data = [
            'title' => $absensi,
            'absensi' => $absensi
        ];
        return view('KerjaPraktek/printAbsensiKp', $data);
    }
}
