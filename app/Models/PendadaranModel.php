<?php

namespace App\Models;

use CodeIgniter\Model;

class PendadaranModel extends Model
{
    protected $table = 'pendadaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nim', 'nama', 'dosen1', 'dosen2', 'judul', 'reviewer',
        'ketuaPenguji', 'sekretarisPenguji', 'anggotaPenguji',
        'tanggal', 'nilai', 'keterangan', 'beritaAcara'
    ];


    public function search($key)
    {
        $builder = $this->table('pendadaran');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
