<?php

namespace App\Models;

use CodeIgniter\Model;

class SkripsiModel extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'judul', 'nama', 'dosenPembimbing1', 'dosenPembimbing2', 'tanggal', 'skripsi'];


    public function search($key)
    {
        $builder = $this->table('skripsi');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
