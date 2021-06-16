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
        return 5;
    }

    public function model(array $row)
    {
        return new F3s_model([
            '' => $row['NO.'],
            'prodi' => $row['Prodi'],
            'jenjang' => $row['Jenjang'],
            'semester' => $row['Semester'],
            'kelas' => $row['Kelas'],
            'jumlah_mahasiswa' => $row['Jumlah Mahasiswa'],
            'status_l' => $row['L'],
            'status_lp' => $row['LP'],
            'status_ct' => $row['CT'],
            'status_ml' => $row['ML'],
            'status_md' => $row['MD'],
            'status_do' => $row['DO'],
            'nama_mahasiswa' => $row['Nama Mahasiswa'],
            'nim' => $row['NIM'],
            'tahun' => $row['Tahun']
        ]);
    }
}
