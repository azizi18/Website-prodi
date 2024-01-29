<?php

namespace App\Imports;

use App\Models\NamaPengajar_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengajarImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NamaPengajar_model([
            'nidn'     => $row['nidn'],
            'nik_nip'     => $row['studi'],
            'nama'    => $row['nama'], 
        ]);
    }
}
