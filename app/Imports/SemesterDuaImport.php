<?php

namespace App\Imports;

use App\Models\SemesterDua_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SemesterDuaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SemesterDua_model([
            'kode_mk'     => $row['kode_mk'],
            'nama_mk'     => $row['nama_mk'],
            'sks'         => $row['sks'], 
        ]);
    }
}
