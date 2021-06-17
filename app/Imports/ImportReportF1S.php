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
        return 6;
    }
    public function model(array $row)
    {
        return new F1s_model([
            '' => $row['NO.'],
            'nama_dosen' => $row['Nama Dosen'],
            'nip' => $row['NIP'],
            'mata_kuliah' => $row['Mata Kuliah'],
            'p1' => $row['P1'],
            'p2' => $row['P2'],
            'p3' => $row['P3'],
            'p4' => $row['P4'],
            'p5' => $row['P5'],
            'p6' => $row['P6'],
            'p7' => $row['P7'],
            'p8' => $row['P8'],
            'p9' => $row['P9'],
            'p10' => $row['P10'],
            'p11' => $row['P11'],
            'p12' => $row['P12'],
            'p13' => $row['P13'],
            'p14' => $row['P14'],
            'p15' => $row['P15'],
            'p16' => $row['P16'],
            'p17' => $row['P17'],
            'p18' => $row['P18'],
            'p19' => $row['P19'],
            'prosentase_hadir' => $row['Hadir'],
            'prosentase_tidakhadir' => $row['Tidak Hadir'],
            'hadir' => $row['H'],
            'izin' => $row['I'],
            'keluar_dinas' => $row['K'],
            'mangkir' => $row['M'],
            'sakit' => $row['S'],
            'tahun' => $row['Tahun']
        ]);
    }
}
