<?php

namespace App\Imports;

use App\Models\SemesterTiga_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SemesterTigaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SemesterTiga_model([
            'kode_mk'     => $row['kode_mk'],
            'nama_mk'     => $row['nama_mk'],
            'sks'         => $row['sks'], 
        ]);
    }
}
