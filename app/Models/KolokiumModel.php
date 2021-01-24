<?php

namespace App\Models;

use CodeIgniter\Model;

class KolokiumModel extends Model
{
    protected $table = 'kolokium';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nim', 'nama', 'dosen1', 'dosen2', 'judul', 'reviewer',
        'tanggal', 'nilai', 'keterangan', 'beritaAcara'
    ];

    public function search($key)
    {
        $builder = $this->table('kolokium');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
