<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;

class SantriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Santri([
            'nama'  => $row[1],
            'usia'  => $row[2],
            'asal'  => $row[3],
            'foto'  => $row[4],
        ]);

    }
}
