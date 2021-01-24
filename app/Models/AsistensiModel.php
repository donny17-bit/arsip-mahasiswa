<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistensiModel extends Model
{
    protected $table = 'asistensi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'tahunAjaran', 'semester', 'mataKuliah', 'dosenPengampu', 'sertifikat'];

    public function search($key)
    {
        $builder = $this->table('asistensi');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
