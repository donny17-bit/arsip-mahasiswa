<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'idTahun';
    protected $allowedFields = ['tahun', 'tahunAngkatan'];

    public function search($keyword)
    {
        $builder = $this->table('tahun');
        $builder->where('tahun', $keyword);
        $builder->orLike('tahunAngkatan', $keyword, 'before');
        return $builder;
    }
}
