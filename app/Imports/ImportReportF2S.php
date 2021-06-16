<?php

namespace App\Imports;

use App\Models\F2s_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportReportF2S implements ToModel, WithHeadingRow
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
        return new F2s_model([
            '' => $row['NO.'],
            'nama_mahasiswa' => $row['Nama Mahasiswa'],
            'kelas' => $row['Kelas'],
            'nim' => $row['NIM'],
            'ip_s1' => $row['1'],
            'ip_s2' => $row['2'],
            'ip_s3' => $row['3'],
            'ip_s4' => $row['4'],
            'ip_s5' => $row['5'],
            'ip_s6' => $row['6'],
            'ip_s7' => $row['7'],
            'ip_s8' => $row['8'],
            'ipk' => $row['IPK'],
            'status' => $row['Status'],
            'tahun' => $row['Tahun'],
        ]);
    }
}
