<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absensi([
            'name' => $row[1],
            'date' => $row[2],
            'on_duty' => $row[3],
            'off_duty' => $row[4],
            'clock_in' => $row[5],
            'clock_out' => $row[6]
        ]);
    }
}
