<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table = 'jurnal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'judul_jurnal', 'tanggal', 'jurnal'];

    public function search($key)
    {
        $builder = $this->table('jurnal');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
