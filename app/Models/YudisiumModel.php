<?php

namespace App\Models;

use CodeIgniter\Model;

class YudisiumModel extends Model
{
    protected $table = 'yudisium';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'transkripNilai', 'suratLulus'];


    public function search($key)
    {
        $builder = $this->table('yudisium');
        $builder->where('nim', $key)->orWhere('id', $key);
        return $builder;
    }
}
