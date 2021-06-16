<?php

namespace App\Imports;

use App\Models\F1s_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportReportF1S implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 4;
    }
    public function model(array $row)
    {
        return new F1s_model([
            '' => $row['NO.'],
            'nama_dosen' => $row['Nama Dosen'],
            'nip' => $row['NIP'],
            'mata_kuliah' => $row['Mata Kuliah'],
            'kelas' => $row['Kelas'],
            'jpm' => $row['JPM'],
            'kpk' => $row['Rata - rata % kehadiran per KLS'],
            'rata_kehadiran' => $row['Rata - rata % kehadiran per SMT'],
            'tahun' => $row['Tahun']
        ]);
    }
}
