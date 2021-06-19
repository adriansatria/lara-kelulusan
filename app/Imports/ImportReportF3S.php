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
        return 6;
    }

    public function model(array $row)
    {
        return new F3s_model([
            '' => $row['NO.'],
            'nim' => $row['NIM'],
            'nama_mahasiswa' => $row['NAMA MAHASISWA'],
            'izin' => $row['IZIN'],
            'tidak_izin' => $row['TIDAK IZIN'],
            'jumlah' => $row['JUMLAH'],
            'kelakuan' => $row['KELAKUAN'],
            'status_lulus_lalu' => $row['STATUS LULUS SMT SEBELUMNYA'],
            'status_lulus_baru' => $row['STATUS LULUS SMT SEKARANG'],
            'amxsks' => $row['AM X SKS'],
            'ip' => $row['IP'],
            'kapita_selekta2' => $row['KAPITA SELEKTA 2'],
            'k3' => $row['3'],
            'metodologi_penelitian2' => $row['METODOLOGI PENELITIAN 2'],
            'k2' => $row['2'],
            'bahasa_inggris_komunikasi2' => $row['BAHASA INGGRIS KOMUNIKASI 2'],
            'k2_2' => $row['2'],
            'tugas_akhir' => $row['TUGAS AKHIR'],
            'k6' => $row['6'],
        ]);
    }
}
