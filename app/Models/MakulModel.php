<?php

namespace App\Models;

use CodeIgniter\Model;

class MakulModel extends Model
{
    protected $table = 'makul';
    protected $primaryKey = 'idMakul';
    // protected $allowedFields = ['nim', 'tahunAjaran', 'mataKuliah', 'dosenPengampu', 'sertifikat'];

    // public function search($key)
    // {
    //     $builder = $this->table('makul');
    //     $builder->Where('idMakul', $key);
    //     return $builder;
    // }
}
