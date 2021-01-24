<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\TahunModel;

class Years extends BaseController
{
    public function yearsPage()
    {
        $tahun = new TahunModel();

        foreach ($tahun->findAll() as $t) {
            if ($t['tahunAngkatan'] == null || $t['tahunAngkatan'] == 0) {
                $thn = 2000 + $t['tahun'];

                $tahun->save([
                    'idTahun' => $t['idTahun'],
                    'tahunAngkatan' => $thn
                ]);
            }
        }

        $dataTahun = $tahun->orderBy('tahun', 'desc');

        $data = [
            'title' => 'Tahun Angkatan',
            'tahun' => $dataTahun->paginate(12, 'tahun'),
            'pager' => $tahun->pager
        ];

        return view('Years/yearsPage', $data);
    }


    //--------------------------------------------------------------------

}
