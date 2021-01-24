<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'idDosen';
    protected $allowedFields = ['npp', 'nama', 'prodi'];

    public function search($keyword)
    {
        $builder = $this->table('dosen');
        $builder->where('npp', $keyword);
        return $builder;
    }
}
