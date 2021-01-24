<?php

namespace App\Models;

use CodeIgniter\Model;

class LombaModel extends Model
{
    protected $table = 'lomba';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama_lomba', 'tanggal', 'sertifikat'];


    public function search($key)
    {
        $builder = $this->table('lomba');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
