<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;

//use CodeIgniter\HTTP\Request;

class Mahasiswa extends BaseController
{
    public function detailStudent($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $dataMah = $mahasiswa->search($nim)->findAll();
        // dd($dataMah);
        $data = [
            'title' => 'Detail Mahasiswa',
            'dataMah' => $dataMah,
            'nim'   => $nim
        ];
        return view('Mahasiswa/detailStudentPage', $data);
    }

    public function tambahMahasiswa()
    {
        session();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();

        $data = [
            'title' => 'Tambah Mahasiswa | Arsip Mahasiswa',
            'validation' => \Config\Services::validation(),
            'dosen' => $dataDosen
        ];
        return view('Pages/tambahMahasiswa', $data);
    }

    public function saveTambahMahasiswa()
    {
        $mahasiswa = new MahasiswaModel();

        //validasi data
        if (!$this->validate([
            'nama' => [
                //  'rules' => 'required|is_unique[mah.nama]',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus di isi'
                    // 'is_unique' => '{field} Nama sudah terdaftar'
                ]
            ],
            'nim' => [
                // 'rules' => 'required|is_unique[mah.nim]',
                'rules' => 'required|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM harus di isi',
                    'is_unique' => 'NIM sudah terdaftar'
                ]
            ],
            'jenisKelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silakan pilih jenis kelamin'
                ]
            ],
            'tahunAngkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun angkatan harus di isi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan pilih status mahasiswa'
                ]
            ],
            // 'tempat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tempat lahir harus di isi'
            //     ]
            // ],
            // 'tanggalLahir' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'tanggal lahir harus di isi'
            //     ]
            // ],
            // 'alamat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat harus di isi'
            //     ]
            // ],
            // 'kontak' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'silakan masukkan kontak'
            //     ]
            // ],
            // 'email' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'silakan masukkan email'
            //     ]
            // ],
            'dpa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'DPA harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/tambahMahasiswa'))->withInput();
        }

        $mahasiswa->save([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'status' => $this->request->getVar('status'),
            'jenisKelamin' => $this->request->getVar('jenisKelamin'),
            'tahunAngkatan' => $this->request->getVar('tahunAngkatan'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggalLahir' => $this->request->getVar('tanggalLahir'),
            'alamat' => $this->request->getVar('alamat'),
            'kontak' => $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'dpa' => $this->request->getVar('dpa')
        ]);

        session()->setFlashData('pesan', 'Data Mahasiswa Berhasil diubah');

        return redirect()->to(base_url('/perbaruiMhs'));
    }

    public function editMahasiswa($nim)
    {
        session();
        $dosen = new DosenModel();
        $dataDosen = $dosen->findAll();
        $mahasiswa = new MahasiswaModel();

        // dd($dosen->findAll());
        //$dataMah = $mahasiswa->search($nim);
        // dd($jurnal->search($id)->first());

        //$currentPage = $this->request->getVar('page_lomba') ? $this->request->getVar('page_lomba') : 1;
        $data = [
            'title' => 'Ubah Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'nim'   => $nim,
            'mahasiswa'    => $mahasiswa->search($nim)->first(),
            'dosen' => $dataDosen
        ];

        return view('Pages/editData', $data);
    }

    public function updateMahasiswa($nim, $id)
    {
        session();
        $mahasiswa = new MahasiswaModel();
        $dataMahLama = $mahasiswa->search($nim)->first();

        // dd($this->request->getVar('jenisKelamin'));

        // //cek nama
        // if ($skripsiLama['judul'] == $this->request->getVar('judul')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required';
        // }

        //validaasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus di isi'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM harus di isi'
                ]
            ],
            'jenisKelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silakan pilih jenis kelamin'
                ]
            ],
            'tahunAngkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun angkatan harus di isi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan pilih status mahasiswa'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat harus di isi'
                ]
            ],
            'tanggalLahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal lahir harus di isi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus di isi'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silakan masukkan kontak'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silakan masukkan email'
                ]
            ],
            'dpa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'DPA harus di isi'
                ]
            ]
        ])) {
            return redirect()->to(base_url('edit-mahasiswa/' . $nim))->withInput();
        }

        $mahasiswa->save([
            'idMahasiswa' => $id,
            'nim' => $nim,
            'nama' => $this->request->getVar('nama'),
            'jenisKelamin' => $this->request->getVar('jenisKelamin'),
            'tahunAngkatan' => $this->request->getVar('tahunAngkatan'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggalLahir' => $this->request->getVar('tanggalLahir'),
            'alamat' => $this->request->getVar('alamat'),
            'kontak' => $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'dpa' => $this->request->getVar('dpa')
        ]);

        session()->setFlashData('pesan', 'Data Mahasiswa Berhasil diubah');

        return redirect()->to(base_url('detail/' . $nim));
    }
}
