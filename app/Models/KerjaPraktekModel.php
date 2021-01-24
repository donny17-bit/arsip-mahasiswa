<?php

namespace App\Models;

use CodeIgniter\Model;

class KerjaPraktekModel extends Model
{
    protected $table = 'kerja_praktek';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nim', 'dosen_pembimbing', 'dosen_seminar',
        'tanggal_mulai', 'tanggal_berakhir', 'tanggal_seminar', 'tempat_kp',
        'surat_tugas', 'absensi', 'berita_acara'
    ];

    public function search($key)
    {
        $builder = $this->table('kerja_praktek');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
