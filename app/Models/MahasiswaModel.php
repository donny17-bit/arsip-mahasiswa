<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'idMahasiswa';
    protected $allowedFields = [
        'nim', 'nama', 'dpa', 'minat', 'tahunAngkatan', 'status',
        'ipk', 'sks', 'jenisKelamin', 'tempat', 'tanggalLahir', 'alamat',
        'kontak', 'email'
    ];

    public function substring($nim)
    {
        $query = $this->query("SELECT SUBSTR(nim, 1, 2) AS tahun 
        FROM mahasiswa where nim like '" . $nim . "%' ESCAPE '!';");
        return $query;
    }

    public function search($keyword)
    {
        $builder = $this->table('mahasiswa');
        $builder->where('nim', $keyword);
        $builder->orLike('nim', $keyword, 'after');
        $builder->orLike('nama', $keyword);
        // $builder->orLike('tahunAngkatan', 2000 + $keyword);
        return $builder;
    }
}
