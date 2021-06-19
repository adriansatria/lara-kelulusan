<?php

namespace App\Imports;

use App\Models\F3s_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportReportF3S implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function headingRow(): int
    {
        return 7;
    }

    public function model(array $row)
    {
        return new F3s_model([
            '' => $row['NO.'],
            'prodi' => $row['PRODI'],
            'jenjang' => $row['JENJANG'],
            'semester' => $row['SEMESTER'],
            'kelas' => $row['KELAS'],
            'jumlah_mahasiswa' => $row['JML. MAHASISWA'],
            'status_l' => $row['L'],
            'status_lp' => $row['LP'],
            'status_ct' => $row['CT'],
            'status_ml' => $row['ML'],
            'status_md' => $row['MD'],
            'status_do' => $row['DO'],
            'nama_mahasiswa' => $row['NAMA MAHASISWA'],
            'nim' => $row['NIM'],
            'tahun' => $row['TAHUN']
        ]);
    }
}
